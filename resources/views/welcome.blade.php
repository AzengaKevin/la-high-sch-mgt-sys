<x-guest-layout>

    <x-slot name="title">Welcome</x-slot>

    <nav class="bg-white">
        <div class="container h-16 flex justify-between items-center mx-auto px-4 sm:px-0">
            <div>
                <div>
                    <a class="flex items-center" href="{{ route('home') }}">
                        <x-application-logo class="h-8 w-8" />
                        <div class="hidden sm:flex items-center">
                            <div class="border-r border-gray-800 mx-4 h-8"></div>
                            <div>{{ config('app.name') }}</div>
                        </div>
                    </a>
                </div>
            </div>
            <div>

                @if (!is_null(Auth::user()))
                    <a href="{{ route('dashboard') }}">Dashboard</a>
                @elseif(!is_null(Auth::guard('student')->user()))
                    <a href="{{ route('student.dashboard') }}">Dashboard</a>
                @elseif(!is_null(Auth::guard('teacher')->user()))
                    <a href="{{ route('teacher.dashboard') }}">Dashboard</a>
                @elseif (Route::has('login'))
                    <a href="{{ route('login') }}" class="px-3 py-2 inline-block">Login</a>
                    @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="px-3 py-2 inline-block">Register</a>
                    @endif
                @endif
            </div>
        </div>
    </nav>

</x-guest-layout>