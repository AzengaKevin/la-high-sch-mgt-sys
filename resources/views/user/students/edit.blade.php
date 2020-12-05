<x-app-layout>

    <x-slot name="title">Edit Student</x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Student ') . '(' . $student->name . ')'  }}
        </h2>
    </x-slot>
    <div class="pt-4 pb-16">
        <form action="{{ route('user.students.update', $student) }}" method="post" novalidate>
            @csrf
            @method('PATCH')

            <div class="px-12 pt-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white flex flex-col md:flex-row border-b border-gray-200">
                            <div class="w-full md:w-1/3 p-2">
                                <h4 class="font-bold">Student Infomation</h4>
                                <p>Information that Identifys the student and belongs to them</p>
                            </div>
                            <div class="w-full md:w-2/3 p-2">
                                <!-- Student Name -->
                                <div class="mt-4 sm:mt-0">
                                    <x-label for="name" :value="__('Name')" />
                                    <x-input id="name" class="block mt-1 w-full" type="text" name="name"
                                        :value="old('name') ?? $student->name" required autofocus />
                                    @error('name')
                                    <span class="text-red-500 inline-block mt-2">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <!-- Student KCPE Marks -->
                                <div class="mt-6">
                                    <x-label for="kcpe_marks" :value="__('KCPE Marks')" />
                                    <x-input id="kcpe_marks" class="block mt-1 w-full" type="text" name="kcpe_marks"
                                        :value="old('kcpe_marks') ?? $student->kcpe_marks" required />
                                    @error('kcpe_marks')
                                    <span class="text-red-500 inline-block mt-2">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <!-- Student KCPE Grade -->
                                <div class="mt-6">
                                    <x-label for="kcpe_grade" :value="__('KCPE Grade')" />
                                    <x-input id="kcpe_grade" class="block mt-1 w-full" type="text" name="kcpe_grade"
                                        :value="old('kcpe_grade') ?? $student->kcpe_grade" required />
                                    @error('kcpe_grade')
                                    <span class="text-red-500 inline-block mt-2">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <!-- Date of Birth -->
                                <div class="mt-6">
                                    <x-label for="dob" :value="__('Date Of Birth')" />
                                    <x-input id="dob" class="block mt-1 w-full" type="date" name="dob"
                                        :value="old('dob') ?? $student->dob" required />
                                        
                                    @error('dob')
                                    <span class="text-red-500 inline-block mt-2">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="px-12 pt-8">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white flex flex-col md:flex-row border-b border-gray-200">
                            <div class="w-full md:w-1/3 p-2">
                                <h4 class="font-bold">System Infomation</h4>
                                <p>Information that Identifys the student in the system</p>
                            </div>
                            <div class="w-full md:w-2/3 p-2">
                                <!-- Admission Number -->
                                <div class="mt-4 sm:mt-0">
                                    <x-label for="admissionNumber" :value="__('Admission Number')" />
                                    <x-input disabled="true" id="admissionNumber" class="block mt-1 w-full" type="text"
                                        name="admission_number" :value="old('admission_number') ?? $student->admission_number" required />
                                        @error('admission_number')
                                        <span class="text-red-500 inline-block mt-2">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                </div>

                                <!-- Stream -->
                                <div class="mt-6">
                                    <x-label for="streamId" :value="__('Stream')" />
                                    <select name="stream_id" id="streamId"
                                        class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                        <option value="" disabled selected>Select Stream...</option>
                                        @foreach ($streams as $stream)
                                        <option {{ ($stream->id == (old('stream_id') ?? $student->stream->id)) ? 'selected="selected"' : '' }} value="{{ $stream->id }}">{{ $stream->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('stream_id')
                                    <span class="text-red-500 inline-block mt-2">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <!-- Level -->
                                <div class="mt-6">
                                    <x-label for="levelId" :value="__('Level')" />
                                    <select name="join_level_id" id="levelId"
                                        class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                        <option value="" disabled selected>Select Level...</option>
                                        @foreach ($levels as $level)
                                        <option {{ ($level->id == (old('join_level_id') ?? $student->joinLevel->id)) ? 'selected="selected"' : '' }} value="{{ $level->id }}">{{ $level->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('join_level_id')
                                    <span class="text-red-500 inline-block mt-2">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="px-12 pt-8">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="overflow-hidden sm:rounded-lg">
                        <div class="p-6 flex justify-end border-b border-gray-200 text-center">
                            <x-button class="ml-3 w-full sm:w-40 text-center">
                                {{ __('Add Student') }}
                            </x-button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>