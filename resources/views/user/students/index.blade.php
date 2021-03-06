<x-app-layout>

    <x-slot name="title">Students</x-slot>

    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('All Students') }}
            </h2>
    
            <x-btn-link href="{{ route('user.students.create') }}">Add Student</x-btn-link>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-x-auto shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if($students->count())
                    <table class=" text-center border border-collapse border border-gray-600 table-auto w-full">
                        <thead class="bg-gray-200">
                            <tr>
                                <th class="border border-gray-600 px-3 py-2">ID</th>
                                <th class="border border-gray-600 px-3 py-2">ADM NO</th>
                                <th class="border border-gray-600 px-3 py-2">Name</th>
                                <th class="border border-gray-600 px-3 py-2">KCPE Marks</th>
                                <th class="border border-gray-600 px-3 py-2">KCPE Grade</th>
                                <th class="border border-gray-600 px-3 py-2">Date of Birth</th>
                                <th class="border border-gray-600 px-3 py-2">Join Class</th>
                                <th class="border border-gray-600 px-3 py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $index => $student)
                            <tr>
                                <td class="border border-gray-600 px-3 py-2">{{ $index + 1 }}</td>
                                <td class="border border-gray-600 px-3 py-2">{{ $student->admission_number }}</td>
                                <td class="border border-gray-600 px-3 py-2">{{ $student->name }}</td>
                                <td class="border border-gray-600 px-3 py-2">{{ $student->kcpe_marks }}</td>
                                <td class="border border-gray-600 px-3 py-2">{{ $student->kcpe_grade }}</td>
                                <td class="border border-gray-600 px-3 py-2">{{ $student->dob->format('Y-m-d') }}</td>
                                <td class="border border-gray-600 px-3 py-2">{{ $student->joinClass() }}</td>
                                <td class="border border-gray-600 px-3 py-2">
                                    <a href="{{ route('user.students.edit', $student) }}" class="px-2 inline-block"><img class="text-red-500" src="{{ asset('icons/pencil-square.svg') }}" alt="Edit Student"></a>
                                    <button class="px-2"><img src="{{ asset('icons/trash.svg') }}" alt="Delete Student"></button>
                                </td>
                            </tr>   
                            @endforeach
                        </tbody>
                    </table>
                    
                    <div class="py-2">
                        {{ $students->links() }}
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
