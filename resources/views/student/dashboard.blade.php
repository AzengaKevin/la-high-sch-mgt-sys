<x-guest-layout>

    <x-slot name="title">Student Dashboard</x-slot>

    <div class="py-12 flex flex-col items-center justify-center">
        <div>
            <a href="{{ route('home') }}">
                <x-application-logo class="h-16 w-16" />
            </a>
        </div>
        <div class="sm:rounded-lg mt-3">
            <div class="p-6 bg-gray-200 border-b border-gray-300">
                You're logged in as a student!
            </div>
        </div>
    </div>
</x-guest-layout>