<x-teacher-layout>

    <x-slot name="title">Teacher Profile</x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col sm:flex-row">
                <div class="w-full sm:w-1/3 px-6 sm:px-0">
                    <h3 class="text-gray-700 text-xl">Profile Information</h3>
                    <p class="text-gray-400 mt-2">You account profile imformation</p>
                </div>
                <div class="w-full sm:w-2/3 bg-white overflow-hidden shadow-sm sm:rounded-lg mt-4 sm:mt-0">
                    <div class="p-6 bg-white">
                        <form action="{{ route('teacher.me.profile.update') }}" method="post">
                            @csrf
                            @method('PATCH')
                            <div>
                                <x-label for="name" :value="__('Name')" />
                                <x-input id="name" class="block mt-1 w-full" type="text" name="name"
                                    :value="old('name') ?? $teacher->name" required autofocus />
                            </div>
                            <div class="mt-6">
                                <x-label for="email" :value="__('Email Address')" />
                                <x-input id="email" class="block mt-1 w-full" type="email" name="email"
                                    :value="old('email') ?? $teacher->email" required />
                            </div>
                            <div class="mt-6">
                                <x-label for="phone" :value="__('Mobile Number')" />
                                <x-input id="phone" class="block mt-1 w-full" type="tel" name="phone"
                                    :value="old('phone') ?? $teacher->phone" required />
                            </div>

                            <div class="mt-6 flex justify-start sm:justify-end">
                                <x-button>Save</x-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <hr class="my-8">
            <div class="flex flex-col sm:flex-row">
                <div class="w-full sm:w-1/3 px-6 sm:px-0">
                    <h3 class="text-gray-700 text-xl">Update Password</h3>
                    <p class="text-gray-400 mt-2">Use a strong password to stay secure</p>
                </div>
                <div class="w-full sm:w-2/3 bg-white overflow-hidden shadow-sm sm:rounded-lg mt-4 sm:mt-0">
                    <div class="p-6 bg-white">
                        <form action="" method="post">
                            <div>
                                <x-label for="currentPassword" :value="__('Current Password')" />
                                <x-input id="currentPassword" class="block mt-1 w-full" type="password"
                                    name="current_password" required />
                            </div>
                            <div class="mt-6">
                                <x-label for="password" :value="__('New Password')" />
                                <x-input id="password" class="block mt-1 w-full" type="password" name="password"
                                    required />
                            </div>
                            <div class="mt-6">
                                <x-label for="password_confirmation" :value="__('Confirm Password')" />
                                <x-input id="password_confirmation" class="block mt-1 w-full" type="password"
                                    name="password_confirmation" required />
                            </div>

                            <div class="mt-6 flex justify-start sm:justify-end">
                                <x-button>Save</x-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-teacher-layout>