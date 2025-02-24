<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Salaries') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="overflow-x-auto">
                        <table class="min-w-full border border-gray-200 divide-y divide-gray-200 shadow-md rounded-lg">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">ID</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Employee</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Month</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Year</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Basic Salary</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Bonus</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">BPJS</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">JP</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Loan</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Total Salary</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($salaries as $salary)
                                    <tr class="hover:bg-gray-100 transition">
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $salary->id }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $salary->employee->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $salary->month }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $salary->year }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $salary->basic_salary }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $salary->bonus }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $salary->bpjs }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $salary->jp }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $salary->loan }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $salary->total_salary }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">
                        {{ $salaries->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>