<x-student-layout>

    <x-slot name="title">Student Details</x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col sm:flex-row">
                <div class="w-full sm:w-1/3 px-6 sm:px-0">
                    <h3 class="text-gray-700 text-xl">Personal Information</h3>
                    <p class="text-gray-400 mt-2">You personal account information</p>
                </div>
                <div class="w-full sm:w-2/3 bg-white overflow-hidden shadow-sm sm:rounded-lg mt-4 sm:mt-0">
                    <div class="p-6 bg-white">
                        <form action="#" method="post">
                            @csrf
                            @method('PATCH')
                            <div>
                                <x-label for="kcpe_marks" :value="__('KCPE Marks')" />
                                <x-input id="kcpe_marks" class="block mt-1 w-full" type="text" name="kcpe_marks"
                                    :value="old('kcpe_marks') ?? $student->kcpe_marks" required autofocus />
                            </div>
                            <div class="mt-4">
                                <x-label for="kcpe_grade" :value="__('KCPE Grade')" />
                                <x-input id="kcpe_grade" class="block mt-1 w-full" type="text" name="kcpe_grade"
                                    :value="old('kcpe_grade') ?? $student->kcpe_grade" required />
                            </div>
                            <div class="mt-4">
                                <x-label for="dob" :value="__('Date Of Birth')" />
                                <x-input id="dob" class="block mt-1 w-full" type="date" name="dob"
                                    :value="old('dob') ?? $student->dob->format('Y-m-d')" required />
                            </div>
                            <div class="mt-6 flex justify-start sm:justify-end">
                                <x-button aria-disabled="true" disabled="true" type="button">Save</x-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <hr class="my-8">
            <div class="flex flex-col sm:flex-row">
                <div class="w-full sm:w-1/3 px-6 sm:px-0">
                    <h3 class="text-gray-700 text-xl">School Information</h3>
                    <p class="text-gray-400 mt-2">Information that Identifys you in the school</p>
                </div>
                <div class="w-full sm:w-2/3 bg-white overflow-hidden shadow-sm sm:rounded-lg mt-4 sm:mt-0">
                    <div class="p-6 bg-white">
                        <form action="#" method="post">
                            @csrf
                            @method('PATCH')
                            <div>
                                <x-label for="admission_number" :value="__('Admission Number')" />
                                <x-input disabled="true" aria-disabled="true" id="admission_number"
                                    class="block mt-1 w-full" type="text" name="admission_number"
                                    :value="$student->admission_number" required />
                            </div>
                            <div class="mt-4">
                                <x-label for="stream" :value="__('Stream')" />
                                <x-input disabled="true" aria-disabled="true" id="stream"
                                    class="block mt-1 w-full" type="text" name="stream"
                                    :value="$student->stream->name" required />
                            </div>
                            <div class="mt-4">
                                <x-label for="join_level" :value="__('Join Level')" />
                                <x-input disabled="true" aria-disabled="true" id="join_level"
                                    class="block mt-1 w-full" type="text" name="join_level"
                                    :value="$student->joinLevel->name" required />
                            </div>
                            <div class="mt-4">
                                <x-label for="join_date" :value="__('Join Date')" />
                                <x-input id="join_date" class="block mt-1 w-full" type="date" name="join_date"
                                    :value="old('join_date') ?? $student->join_date->format('Y-m-d')" required />
                            </div>

                            <div class="mt-6 flex justify-start sm:justify-end">
                                <x-button disabled="true" aria-disabled="true">Save</x-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-student-layout>