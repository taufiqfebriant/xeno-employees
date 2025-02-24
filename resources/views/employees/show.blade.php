<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Employee Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-4">
                        <x-input-label for="name" :value="__('Name')" />
                        <p id="name" class="block mt-1 w-full">{{ $employee->name }}</p>
                    </div>

                    <div class="mb-4">
                        <x-input-label for="email" :value="__('Email')" />
                        <p id="email" class="block mt-1 w-full">{{ $employee->email }}</p>
                    </div>

                    <div class="mb-4">
                        <x-input-label for="address" :value="__('Address')" />
                        <p id="address" class="block mt-1 w-full">{{ $employee->address }}</p>
                    </div>

                    <div class="mb-4">
                        <x-input-label for="phone" :value="__('Phone')" />
                        <p id="phone" class="block mt-1 w-full">{{ $employee->phone }}</p>
                    </div>

                    <div class="mb-4">
                        <x-input-label for="user_picture" :value="__('User Picture')" />
                        @if ($employee->user_picture)
                            <img src="{{ Storage::url($employee->user_picture) }}" alt="{{ $employee->name }}" class="mt-1" width="200" height="200">
                        @else
                            <p class="text-gray-500">{{ __('No picture available') }}</p>
                        @endif
                    </div>

                    <div class="flex items-center mt-4">
                        <x-secondary-button onclick="window.location='{{ route('employees.index') }}'">
                            {{ __('Back') }}
                        </x-secondary-button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>