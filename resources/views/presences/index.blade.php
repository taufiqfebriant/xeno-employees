<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Presences') }}
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
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Check In</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Check Out</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Late In</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Early Out</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($presences as $presence)
                                    <tr class="hover:bg-gray-100 transition">
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $presence->id }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $presence->employee->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $presence->check_in }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $presence->check_out }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $presence->late_in }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $presence->early_out }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap flex space-x-2">
                                            <a href="{{ route('presences.show', $presence->id) }}" class="px-3 py-1 bg-blue-500 text-white rounded text-xs hover:bg-blue-600 transition">View</a>
                                            <a href="{{ route('presences.edit', $presence->id) }}" class="px-3 py-1 bg-yellow-500 text-white rounded text-xs hover:bg-yellow-600 transition">Edit</a>
                                            <form action="{{ route('presences.destroy', $presence->id) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this presence?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="px-3 py-1 bg-red-500 text-white rounded text-xs hover:bg-red-600 transition">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">
                        {{ $presences->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>