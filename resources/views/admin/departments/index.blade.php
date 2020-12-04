<x-app-layout>

    <x-slot name="title">Departments</x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('School Departments') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if($departments->count())
                    <table class=" text-center border border-collapse border border-gray-600 table-auto w-full">
                        <thead class="bg-gray-200">
                            <tr>
                                <th class="border border-gray-600 px-3 py-2">ID</th>
                                <th class="border border-gray-600 px-3 py-2">Name</th>
                                <th class="border border-gray-600 px-3 py-2">Description</th>
                                <th class="border border-gray-600 px-3 py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($departments as $department)
                            <tr>
                                <td class="border border-gray-600 px-3 py-2">{{ $department->id }}</td>
                                <td class="border border-gray-600 px-3 py-2">{{ $department->name }}</td>
                                <td class="border border-gray-600 px-3 py-2">{{ $department->description ?? 'Not Available' }}</td>
                                <td class="border border-gray-600 px-3 py-2">
                                    <button class="px-2"><img class="text-red-500" src="{{ asset('icons/pencil-square.svg') }}" alt="Edit Level"></button>
                                    <button class="px-2"><img src="{{ asset('icons/trash.svg') }}" alt="Delete Level"></button>
                                </td>
                            </tr>   
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <div class="bg-blue-200 text-blue-700 px-3 py-2 rounded flex items-center">
                        <img width="32" src="{{ asset('/icons/info.svg') }}" alt="Info Icon">
                        <span>No departments found</span>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
