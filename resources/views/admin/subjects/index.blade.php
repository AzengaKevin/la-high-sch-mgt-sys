<x-app-layout>

    <x-slot name="title">Subjects</x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('School Subjects') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-x-auto shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if($subjects->count())
                    <table class=" text-center border border-collapse border border-gray-600 table-auto w-full">
                        <thead class="bg-gray-200">
                            <tr>
                                <th class="border border-gray-600 px-3 py-2">ID</th>
                                <th class="border border-gray-600 px-3 py-2">Name</th>
                                <th class="border border-gray-600 px-3 py-2">Slug</th>
                                <th class="border border-gray-600 px-3 py-2">Department</th>
                                <th class="border border-gray-600 px-3 py-2">Teachers</th>
                                <th class="border border-gray-600 px-3 py-2">Description</th>
                                <th class="border border-gray-600 px-3 py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($subjects as $subject)
                            <tr>
                                <td class="border border-gray-600 px-3 py-2">{{ $subject->id }}</td>
                                <td class="border border-gray-600 px-3 py-2">{{ $subject->name }}</td>
                                <td class="border border-gray-600 px-3 py-2">{{ $subject->slug }}</td>
                                <td class="border border-gray-600 px-3 py-2">{{ $subject->department->name }}</td>
                                <td class="border border-gray-600 px-3 py-2">{{ $subject->teachers->count() }}</td>
                                <td class="border border-gray-600 px-3 py-2">{{ $subject->description ?? 'Not Available' }}</td>
                                <td class="border border-gray-600 px-3 py-2">
                                    <button class="inline-block px-2"><img class="text-red-500" src="{{ asset('icons/pencil-square.svg') }}" alt="Edit Level"></button>
                                    <button class="inline-block px-2"><img src="{{ asset('icons/trash.svg') }}" alt="Delete Level"></button>
                                </td>
                            </tr>   
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <div class="bg-blue-200 text-blue-700 px-3 py-2 rounded flex items-center">
                        <img width="32" src="{{ asset('/icons/info.svg') }}" alt="Info Icon">
                        <span>No subjects found</span>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
