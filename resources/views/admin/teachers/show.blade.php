<x-app-layout>

    <x-slot name="title">Teacher Information</x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Teacher ') . '(' . $teacher->name . ')' }}
        </h2>
    </x-slot>
    <div class="pt-4 pb-16">
        <div class="px-12 pt-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="min-h-screen-75" x-data="{ tab: 'details' }" id="teacher-show-tabs">
                            <nav class="border-b border-gray-100">
                                <a class="inline-block px-3 py-2"
                                    :class="{ 'border-b-2 border-blue-300' : tab === 'details' }"
                                    @click.prevent="tab = 'details'" role="button" href="#">Teachers Details</a>
                                <a class="inline-block px-3 py-2"
                                    :class="{ 'border-b-2 border-blue-300' : tab === 'subjects' }"
                                    @click.prevent="tab = 'subjects'" role="button" href="#">Teachers Subjects</a>
                                <a class="inline-block px-3 py-2"
                                    :class="{ 'border-b-2 border-blue-300' : tab === 'classes' }"
                                    @click.prevent="tab = 'classes'" role="button" href="#">Teachers Classes</a>
                            </nav>
                            <div class="p-3" x-show="tab === 'details'">
                                <div class="p-6 bg-white flex flex-col md:flex-row">
                                    <div class="w-full md:w-1/3 p-2">
                                        <h4 class="font-bold">Teachers Details</h4>
                                        <p>Information that Identifys the teacher.</p>
                                    </div>
                                    <div class="w-full md:w-2/3 p-2">
                                        <!-- Teacher Name -->
                                        <div class="mt-4 sm:mt-0">
                                            <x-label class="font-bold" for="email" :value="__('Email')" />
                                            <div>{{ $teacher->name }}</div>
                                        </div>

                                        <!-- Teacher Email -->
                                        <div class="mt-6">
                                            <x-label class="font-bold" for="email" :value="__('TSC Number')" />
                                            <div>{{ $teacher->tsc_number }}</div>
                                        </div>

                                        <!-- Teachers Phone Number -->
                                        <div class="mt-6">
                                            <x-label class="font-bold" for="phone" :value="__('Phone')" />
                                            <div>{{ $teacher->phone }}</div>
                                        </div>

                                        <!-- Teachers Union -->
                                        <div class="mt-6">
                                            <x-label class="font-bold" for="union" :value="__('Teachers\'s Union')" />
                                            <div>{{ $teacher->union }}</div>
                                        </div>

                                        <div class="mt-8">
                                            <x-btn-link href="{{ route('admin.teachers.edit', $teacher) }}">Edit Teacher
                                            </x-btn-link>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="p-3" x-show="tab === 'subjects'">
                                <div class="p-6 bg-white flex flex-col md:flex-row">
                                    <div class="w-full md:w-1/3 p-2">
                                        <h4 class="font-bold">Teachers Subjects</h4>
                                        <p>Which subjects the teacher takes students through.</p>

                                        <div>
                                            @error('subjects.*')
                                            <span class="block text-red-500 my-2">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="w-full md:w-2/3 p-2">
                                        <form action="{{ route('admin.teachers.subjects.update', $teacher) }}"
                                            method="post">
                                            @csrf
                                            @method('PUT')
                                            <div class="flex flex-wrap flex-col sm:flex-row">
                                                @foreach ($subjects as $subject)
                                                <div class="mt-4 p-2 w-1/3">
                                                    <label for="subject-{{ $subject->id }}"
                                                        class="inline-flex items-center">
                                                        <input
                                                            {{ $teacher->subjects->contains($subject) ? 'checked="true"' : ''}}
                                                            id="subject-{{ $subject->id }}" type="checkbox"
                                                            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                                            name="subjects[{{ $subject->id }}]"
                                                            value="{{ $subject->id }}">
                                                        <span
                                                            class="ml-2 text-sm text-gray-600">{{ $subject->name }}</span>
                                                    </label>
                                                </div>
                                                @endforeach

                                            </div>

                                            <div class="p-2">
                                                <x-button class="text-center">
                                                    {{ __('Update Subjects') }}
                                                </x-button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="p-3" x-show="tab === 'classes'">
                                <div class="py-4 bg-white">
                                    <x-modals.teachers.add-level :levels="$levels" :streams="$streams"
                                        :teacher="$teacher" />

                                    <div class="mt-6">
                                        @if($teacher->lestrsus->count())
                                        <table
                                            class=" text-center border border-collapse border-gray-600 table-auto w-full">
                                            <thead class="bg-gray-200">
                                                <tr>
                                                    <th class="border border-gray-600 px-3 py-2">ID</th>
                                                    <th class="border border-gray-600 px-3 py-2">Level</th>
                                                    <th class="border border-gray-600 px-3 py-2">Stream</th>
                                                    <th class="border border-gray-600 px-3 py-2">Subject</th>
                                                    <th class="border border-gray-600 px-3 py-2">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($teacher->lestrsus as $lestrsu)
                                                <tr>
                                                    <td class="border border-gray-600 px-3 py-2">{{ $lestrsu->id }}</td>
                                                    <td class="border border-gray-600 px-3 py-2">
                                                        {{ $lestrsu->level->name }}</td>
                                                    <td class="border border-gray-600 px-3 py-2">
                                                        {{ $lestrsu->stream->name }}</td>
                                                    <td class="border border-gray-600 px-3 py-2">
                                                        {{ $lestrsu->subject->name }}</td>
                                                    <td class="border border-gray-600 px-3 py-2">
                                                        <button class="px-2"><img class="text-red-500"
                                                                src="{{ asset('icons/pencil-square.svg') }}"
                                                                alt="Edit Level"></button>

                                                        <form class="inline-block" action="{{ route('admin.teachers.lestrsus.destroy', [
                                                            'teacher' => $teacher,
                                                            'lestrsu' => $lestrsu
                                                        ]) }}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="px-2"><img
                                                                    src="{{ asset('icons/trash.svg') }}"
                                                                    alt="Delete Level"></button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        @else
                                        <div class="bg-blue-200 text-blue-700 px-3 py-2 rounded flex items-center">
                                            <img width="32" src="{{ asset('/icons/info.svg') }}" alt="Info Icon">
                                            <span>No levels found</span>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>