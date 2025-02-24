<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Presence') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('presences.update', $presence->id) }}">
                        @csrf
                        @method('PUT')

                        <!-- Employee -->
                        <div>
                            <x-input-label for="employee_id" :value="__('Employee')" />
                            <select id="employee_id" name="employee_id" class="block mt-1 w-full" disabled>
                                @foreach ($employees as $employee)
                                    <option value="{{ $employee->id }}" {{ $employee->id == $presence->employee_id ? 'selected' : '' }}>{{ $employee->name }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('employee_id')" class="mt-2" />
                        </div>

                        <!-- Check In -->
                        <div class="mt-4">
                            <x-input-label for="check_in" :value="__('Check In')" />
                            <x-text-input id="check_in" class="block mt-1 w-full" type="datetime-local" name="check_in" :value="old('check_in', \Carbon\Carbon::parse($presence->check_in)->format('Y-m-d\TH:i'))" required />
                            <x-input-error :messages="$errors->get('check_in')" class="mt-2" />
                        </div>

                        <!-- Check Out -->
                        <div class="mt-4">
                            <x-input-label for="check_out" :value="__('Check Out')" />
                            <x-text-input id="check_out" class="block mt-1 w-full" type="datetime-local" name="check_out" :value="old('check_out', \Carbon\Carbon::parse($presence->check_out)->format('Y-m-d\TH:i'))" required />
                            <x-input-error :messages="$errors->get('check_out')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ml-4">
                                {{ __('Update Presence') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>