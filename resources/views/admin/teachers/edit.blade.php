<x-app-layout>

    <x-slot name="title">Edit Teacher</x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Teacher ') . '(' . $teacher->name . ')' }}
        </h2>
    </x-slot>
    <div class="pt-4 pb-16">
        <form action="{{ route('admin.teachers.update', $teacher) }}" method="post" novalidate>
            @csrf
            @method('PATCH')

            <div class="px-12 pt-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white flex flex-col md:flex-row border-b border-gray-200">
                            <div class="w-full md:w-1/3 p-2">
                                <h4 class="font-bold">Teachers Infomation</h4>
                                <p>Information that Identifys the teacher.</p>
                            </div>
                            <div class="w-full md:w-2/3 p-2">
                                <!-- Teacher Name -->
                                <div class="mt-4 sm:mt-0">
                                    <x-label for="name" :value="__('Name')" />
                                    <x-input id="name" class="block mt-1 w-full" type="text" name="name"
                                        :value="old('name') ?? $teacher->name" required autofocus />
                                    @error('name')
                                    <span class="text-red-500 inline-block mt-2">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <!-- Teacher Email -->
                                <div class="mt-6">
                                    <x-label for="email" :value="__('Email')" />
                                    <x-input id="email" class="block mt-1 w-full" type="email" name="email"
                                        :value="old('email') ?? $teacher->email" required />
                                    @error('email')
                                    <span class="text-red-500 inline-block mt-2">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <!-- Teachers Phone Number -->
                                <div class="mt-6">
                                    <x-label for="phone" :value="__('Phone')" />
                                    <x-input id="phone" class="block mt-1 w-full" type="tel" name="phone"
                                        :value="old('phone') ?? $teacher->phone" required />
                                    @error('phone')
                                    <span class="text-red-500 inline-block mt-2">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <!-- Teachers' TSC Number -->
                                <div class="mt-6">
                                    <x-label for="tscNumber" :value="__('TSC Number')" />
                                    <x-input id="tscNumber" class="block mt-1 w-full" type="text" name="tsc_number"
                                        :value="old('tsc_number') ?? $teacher->tsc_number" required />
                                    @error('tsc_number')
                                    <span class="text-red-500 inline-block mt-2">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <!-- Teachers Union -->
                                <div class="mt-6">
                                    <x-label for="union" :value="__('Teachers\'s Union')" />
                                    <select name="union" id="union"
                                        class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                        <option value="" disabled selected>Select Union...</option>
                                        @foreach (\App\Models\Teacher::unions() as $union)
                                        <option  {{ ((old('union') ?? $teacher->union) == $union) ? 'selected="selected"' : '' }}  value="{{ $union }}">{{ strtoupper($union) }}</option>
                                        @endforeach
                                    </select>
                                    @error('union')
                                    <span class="text-red-500 inline-block mt-2">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="mt-8">
                                    <x-button class="text-center">
                                        {{ __('Update Teacher') }}
                                    </x-button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </form>
    </div>
</x-app-layout>