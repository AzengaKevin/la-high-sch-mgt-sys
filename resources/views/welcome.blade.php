<x-guest-layout>

    <x-slot name="title">Welcome</x-slot>

    <!-- This example requires Tailwind CSS v2.0+ -->
    <div x-data="{ menuOpen: false }" class="relative bg-white overflow-hidden min-h-screen">
        <div class="max-w-7xl mx-auto lg:h-screen">
            <div class="relative z-10 pb-8 bg-white sm:pb-16 md:pb-20 lg:max-w-2xl lg:w-full lg:pb-28 xl:pb-32">
                <div class="relative pt-6 px-4 sm:px-6 lg:px-8">
                    <nav class="relative flex items-center justify-between sm:h-10 lg:justify-start"
                        aria-label="Global">
                        <div class="flex items-center flex-grow flex-shrink-0 lg:flex-grow-0">
                            <div class="flex items-center justify-between w-full md:w-auto">
                                <a href="{{ route('home') }}">
                                    <span class="sr-only">{{ config('app.name', 'Azenta') }}</span>
                                    <x-application-logo class="h-8 w-auto sm:h-10" />
                                </a>

                                <div class="-mr-2 flex items-center md:hidden">
                                    <button type="button" @click="menuOpen = !menuOpen"
                                        class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500"
                                        id="main-menu" aria-haspopup="true">
                                        <span class="sr-only">Open main menu</span>
                                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 6h16M4 12h16M4 18h16" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="hidden md:block md:ml-10 md:pr-4 md:space-x-8">
                            @if (!is_null(Auth::user()))
                            <a class="font-medium text-indigo-600 hover:text-indigo-500"
                                href="{{ route('dashboard') }}">Dashboard</a>
                            @elseif(!is_null(Auth::guard('student')->user()))
                            <a class="font-medium text-indigo-600 hover:text-indigo-500"
                                href="{{ route('student.dashboard') }}">Dashboard</a>
                            @elseif(!is_null(Auth::guard('teacher')->user()))
                            <a class="font-medium text-indigo-600 hover:text-indigo-500"
                                href="{{ route('teacher.dashboard') }}">Dashboard</a>
                            @elseif (Route::has('login'))
                            <a class="font-medium text-indigo-600 hover:text-indigo-500" href="{{ route('login') }}"
                                class="px-3 py-2 inline-block">Log in</a>
                            @endif
                        </div>
                    </nav>
                </div>

                <div x-show="menuOpen"
                    class="absolute top-0 inset-x-0 p-2 transition transform origin-top-right md:hidden">
                    <div class="rounded-lg shadow-md bg-white ring-1 ring-black ring-opacity-5 overflow-hidden">
                        <div class="px-5 pt-4 flex items-center justify-between">
                            <div>
                                <img class="h-8 w-auto"
                                    src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg" alt="">
                            </div>
                            <div class="-mr-2">
                                <button type="button" @click="menuOpen = false"
                                    class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
                                    <span class="sr-only">Close main menu</span>
                                    <!-- Heroicon name: x -->
                                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div role="menu" aria-orientation="vertical" aria-labelledby="main-menu">
                            <div role="none">
                                @if (!is_null(Auth::user()))
                                <a href="{{ route('dashboard') }}" class="block w-full px-5 py-3 text-center font-medium text-indigo-600 bg-gray-50 hover:bg-gray-100">Dashboard</a>
                                @elseif(!is_null(Auth::guard('student')->user()))
                                <a href="{{ route('student.dashboard') }}" class="block w-full px-5 py-3 text-center font-medium text-indigo-600 bg-gray-50 hover:bg-gray-100">Dashboard</a>
                                @elseif(!is_null(Auth::guard('teacher')->user()))
                                <a href="{{ route('teacher.dashboard') }}" class="block w-full px-5 py-3 text-center font-medium text-indigo-600 bg-gray-50 hover:bg-gray-100">Dashboard</a>
                                @elseif (Route::has('login'))
                                <a href="{{ route('login') }}" class="block w-full px-5 py-3 text-center font-medium text-indigo-600 bg-gray-50 hover:bg-gray-100">Login</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <main class="mt-10 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28">
                    <div class="sm:text-center lg:text-left">
                        <h1 class="text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl">
                            <span class="block xl:inline">{{ config('app.name') }}</span>
                            <span class="block text-indigo-600 xl:inline">Cloud-Based School</span>
                        </h1>
                        <p
                            class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
                            Conduct Everything, And I mean everything from our online School ERP System, From Student -
                            Guardians / Parent - Teachers We've got all of you covered
                        </p>
                        <div class="mt-5 sm:mt-8 sm:flex sm:justify-center lg:justify-start">
                            <div class="rounded-md shadow">
                                <a href="{{ route('login') }}"
                                    class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 md:py-4 md:text-lg md:px-10">
                                    Get started
                                </a>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">
            <img class="h-56 w-full object-cover sm:h-72 md:h-96 lg:w-full lg:h-screen"
                src="https://images.unsplash.com/photo-1583607264434-2d8e199b3a17?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=750&q=80"
                alt="School Laboratory">
        </div>
    </div>

</x-guest-layout>