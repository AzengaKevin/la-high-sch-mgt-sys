@props(['levels', 'teacher', 'streams'])

<!-- Modal DIV -->
<div class="" x-data="{ open: false }">

    <!-- Modal Launcher -->
    <button class="px-4 py-2 text-white bg-gray-800 rounded select-none outline-none focus:shadow-outline"
        @click="open = true">Add Class</button>

    <!-- Dialog (Full Screen) -->
    <div class="absolute top-0 left-0 flex items-center justify-center w-full h-full"
        style="background: rgba(0, 0, 0, 0.6);" x-show="open">

        <div class="h-auto p-4 mx-2 text-left bg-white rounded shadow-xl md:w-96 md:p-6 lg:p-8 md:mx-0"
            @click.away="open = false">

            <form action="{{ route('admin.teachers.levels.store', $teacher) }}" method="post">
                @csrf
                <div class="mt-3 text-center sm:mt-0 sm:-ml-4 sm:text-left">
                    <h3 class="text-lg font-bold leading-6 text-gray-900">
                        Add A Teachers Class
                    </h3>

                    <div class="mt-2">
                        <div class="">
                            <x-label for="level" :value="__('Level')" />
                            <select name="level_id" id="level"
                                class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <option value="" disabled selected>Select Level...</option>
                                @foreach ($levels as $level)
                                <option {{ (old('level_id') == $level->id) ? 'selected="selected"' : '' }}
                                    value="{{ $level->id }}">{{ strtoupper($level->name) }}</option>
                                @endforeach
                            </select>
                            @error('level_id')
                            <span class="text-red-500 inline-block mt-2">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mt-4">
                            <x-label for="stream" :value="__('Stream')" />
                            <select name="stream_id" id="stream"
                                class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <option value="" disabled selected>Select Stream...</option>
                                @foreach ($streams as $stream)
                                <option {{ (old('stream_id') == $stream->id) ? 'selected="selected"' : '' }}
                                    value="{{ $stream->id }}">{{ strtoupper($stream->name) }}</option>
                                @endforeach
                            </select>
                            @error('stream_id')
                            <span class="text-red-500 inline-block mt-2">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mt-4">
                            <x-label for="subject" :value="__('subject')" />
                            <select name="subject_id" id="subject"
                                class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <option value="" disabled selected>Select subject...</option>
                                @foreach ($teacher->subjects as $subject)
                                <option {{ (old('subject_id') == $subject->id) ? 'selected="selected"' : '' }}
                                    value="{{ $subject->id }}">{{ strtoupper($subject->name) }}</option>
                                @endforeach
                            </select>
                            @error('subject_id')
                            <span class="text-red-500 inline-block mt-2">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="mt-5 sm:mt-6 flex">
                    <button type="button" @click="open = false"
                        class="inline-flex justify-center w-full px-4 py-2 text-white bg-gray-500 rounded hover:bg-gray-700 mx-2">Cancel</button>
                    <button @click="open = false"
                        class="inline-flex justify-center w-full px-4 py-2 text-white bg-gray-500 rounded hover:bg-gray-700 mx-2">
                        Submit
                    </button>
                </div>
            </form>

        </div>
    </div>
</div> <!-- End the modal section -->