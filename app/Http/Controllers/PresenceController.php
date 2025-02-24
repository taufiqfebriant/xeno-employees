<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmpPresence;
use App\Models\Employee;
use App\Jobs\UpdateSalary;
use Illuminate\Support\Facades\Validator;

class PresenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $presences = EmpPresence::with('employee')->paginate(10);
        return view('presences.index', compact('presences'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employees = Employee::all();
        return view('presences.create', compact('employees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'employee_id' => 'required|exists:employee,id',
            'check_in' => 'required|date_format:Y-m-d\TH:i',
            'check_out' => 'required|date_format:Y-m-d\TH:i|after:check_in',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $checkIn = \DateTime::createFromFormat('Y-m-d\TH:i', $request->check_in);
        $checkOut = \DateTime::createFromFormat('Y-m-d\TH:i', $request->check_out);

        $workStart = new \DateTime($checkIn->format('Y-m-d') . ' 08:00:00');
        $workEnd = new \DateTime($checkOut->format('Y-m-d') . ' 17:00:00');

        $lateIn = $checkIn->getTimestamp() - $workStart->getTimestamp();
        $earlyOut = $checkOut->getTimestamp() - $workEnd->getTimestamp();

        $presence = new EmpPresence();
        $presence->employee_id = $request->employee_id;
        $presence->check_in = $checkIn->format('Y-m-d H:i:s');
        $presence->check_out = $checkOut->format('Y-m-d H:i:s');
        $presence->late_in = $lateIn;
        $presence->early_out = $earlyOut;
        $presence->save();

        UpdateSalary::dispatch($request->employee_id, $lateIn, $earlyOut);

        return redirect()->route('presences.index')->with('success', 'Presence recorded successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $presence = EmpPresence::with('employee')->findOrFail($id);
        return view('presences.show', compact('presence'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $presence = EmpPresence::findOrFail($id);
        $employees = Employee::all();
        return view('presences.edit', compact('presence', 'employees'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'check_in' => 'required|date_format:Y-m-d\TH:i',
            'check_out' => 'required|date_format:Y-m-d\TH:i|after:check_in',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $checkIn = \DateTime::createFromFormat('Y-m-d\TH:i', $request->check_in);
        $checkOut = \DateTime::createFromFormat('Y-m-d\TH:i', $request->check_out);

        $workStart = new \DateTime($checkIn->format('Y-m-d') . ' 08:00:00');
        $workEnd = new \DateTime($checkOut->format('Y-m-d') . ' 17:00:00');

        $lateIn = $checkIn->getTimestamp() - $workStart->getTimestamp();
        $earlyOut = $checkOut->getTimestamp() - $workEnd->getTimestamp();

        $presence = EmpPresence::findOrFail($id);
        $presence->check_in = $checkIn->format('Y-m-d H:i:s');
        $presence->check_out = $checkOut->format('Y-m-d H:i:s');
        $presence->late_in = $lateIn;
        $presence->early_out = $earlyOut;
        $presence->save();

        UpdateSalary::dispatch($presence->employee_id, $lateIn, $earlyOut);

        return redirect()->route('presences.index')->with('success', 'Presence updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $presence = EmpPresence::findOrFail($id);
        $lateIn = $presence->late_in;
        $earlyOut = $presence->early_out;
        $employeeId = $presence->employee_id;

        $presence->delete();

        UpdateSalary::dispatch($employeeId, $lateIn, $earlyOut, true);

        return redirect()->route('presences.index')->with('success', 'Presence deleted successfully.');
    }
}
