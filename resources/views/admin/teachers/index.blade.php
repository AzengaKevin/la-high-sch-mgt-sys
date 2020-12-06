<x-app-layout>

    <x-slot name="title">Teachers</x-slot>

    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('All Teachers') }}
            </h2>

            <x-btn-link href="{{ route('admin.teachers.create') }}">Add Teacher</x-btn-link>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-x-auto shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if($teachers->count())
                    <table class=" text-center border border-collapse border border-gray-600 table-auto w-full">
                        <thead class="bg-gray-200">
                            <tr>
                                <th class="border border-gray-600 px-3 py-2">ID</th>
                                <th class="border border-gray-600 px-3 py-2">TSC NO</th>
                                <th class="border border-gray-600 px-3 py-2">Name</th>
                                <th class="border border-gray-600 px-3 py-2">Email</th>
                                <th class="border border-gray-600 px-3 py-2">Phone Number</th>
                                <th class="border border-gray-600 px-3 py-2">Union</th>
                                <th class="border border-gray-600 px-3 py-2">Join Date</th>
                                <th class="border border-gray-600 px-3 py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($teachers as $index => $teacher)
                            <tr>
                                <td class="border border-gray-600 px-3 py-2">{{ $index + 1 }}</td>
                                <td class="border border-gray-600 px-3 py-2">{{ $teacher->tsc_number }}</td>
                                <td class="border border-gray-600 px-3 py-2">{{ $teacher->name }}</td>
                                <td class="border border-gray-600 px-3 py-2">{{ $teacher->email }}</td>
                                <td class="border border-gray-600 px-3 py-2">{{ $teacher->phone }}</td>
                                <td class="border border-gray-600 px-3 py-2">{{ $teacher->union }}</td>
                                <td class="border border-gray-600 px-3 py-2">{{ $teacher->created_at->format('Y-m-d') }}</td>
                                <td class="border border-gray-600 px-3 py-2">
                                    <a href="{{ route('admin.teachers.show', $teacher) }}" class="px-2 inline-block"><img
                                            class="text-blue-500" src="{{ asset('icons/eye.svg') }}"
                                            alt="Edit Teacher"></a>
                                    <a href="{{ route('admin.teachers.edit', $teacher) }}" class="px-2 inline-block"><img
                                            class="text-red-500" src="{{ asset('icons/pencil-square.svg') }}"
                                            alt="Edit Teacher"></a>
                                    <button class="px-2"><img src="{{ asset('icons/trash.svg') }}"
                                            alt="Delete Teacher"></button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="py-2">
                        {{ $teachers->links() }}
                    </div>
                    @else
                    <div class="bg-blue-200 text-blue-700 px-3 py-2 rounded flex items-center">
                        <img width="32" src="{{ asset('/icons/info.svg') }}" alt="Info Icon">
                        <span>No Students found</span>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>