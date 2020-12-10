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

    <div class="">
        <!-- Modal DIV -->
        <div class="mt-6" x-data="{ open: false }">

            <!-- Modal Launcher -->
            <button class="px-4 py-2 text-white bg-blue-500 rounded select-none no-outline focus:shadow-outline"
                @click="open = true">Show Modal</button>

            <!-- Dialog (Full Screen) -->
            <div class="absolute top-0 left-0 flex items-center justify-center w-full h-full"
                style="background: rgba(0, 0, 0, 0.5);" x-show="open">

                <div class="h-auto p-4 mx-2 text-left bg-white rounded shadow-xl md:max-w-xl md:p-6 lg:p-8 md:mx-0"
                    @click.away="open = false">

                    <form action="" method="get">
                        <div class="mt-3 text-center sm:mt-0 sm:-ml-4 sm:text-left">
                            <h3 class="text-lg font-medium leading-6 text-gray-900">Modal Title</h3>
    
                            <div class="mt-2">
                                <p class="text-sm leading-5 text-gray-500">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa possimus ab dolorem vitae
                                    laboriosam soluta rem corrupti fugit sint illum nesciunt minus cumque, temporibus quaerat
                                    numquam et tempora, hic ipsam iusto? Quisquam est, aliquid magni ad ea inventore, quod culpa
                                    illum sunt cumque incidunt sit? Nemo rem dolor sequi obcaecati?
                                </p>
                            </div>
                        </div>
    
                        <div class="mt-5 sm:mt-6">
                            <span class="flex w-full rounded-md shadow-sm">
                                <button type="button" @click="open = false" class="inline-flex justify-center w-full px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-700">Close Modal</button>
                            </span>
                            <span class="flex w-full rounded-md shadow-sm inline-block mt-2">
                                <button @click="open = false" class="inline-flex justify-center w-full px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-700">Close Modal</button>
                            </span>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

</x-guest-layout>