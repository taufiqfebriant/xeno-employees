<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Presence Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-4">
                        <x-input-label for="employee" :value="__('Employee')" />
                        <p id="employee" class="block mt-1 w-full">{{ $presence->employee->name }}</p>
                    </div>

                    <div class="mb-4">
                        <x-input-label for="check_in" :value="__('Check In')" />
                        <p id="check_in" class="block mt-1 w-full">{{ $presence->check_in }}</p>
                    </div>

                    <div class="mb-4">
                        <x-input-label for="check_out" :value="__('Check Out')" />
                        <p id="check_out" class="block mt-1 w-full">{{ $presence->check_out }}</p>
                    </div>

                    <div class="mb-4">
                        <x-input-label for="late_in" :value="__('Late In')" />
                        <p id="late_in" class="block mt-1 w-full">{{ $presence->late_in }}</p>
                    </div>

                    <div class="mb-4">
                        <x-input-label for="early_out" :value="__('Early Out')" />
                        <p id="early_out" class="block mt-1 w-full">{{ $presence->early_out }}</p>
                    </div>

                    <div class="flex items-center mt-4">
                        <x-secondary-button onclick="window.location='{{ route('presences.index') }}'">
                            {{ __('Back') }}
                        </x-secondary-button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>