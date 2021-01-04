<x-teacher-layout>

    <x-slot name="title">Teacher Classes</x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Classes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if($lestrsus->count())
                    <table class=" text-center border border-collapse border-gray-600 table-auto w-full">
                        <thead class="bg-gray-200">
                            <tr>
                                <th class="border border-gray-600 px-3 py-2">ID</th>
                                <th class="border border-gray-600 px-3 py-2">Level</th>
                                <th class="border border-gray-600 px-3 py-2">Stream</th>
                                <th class="border border-gray-600 px-3 py-2">Subject</th>
                                <th class="border border-gray-600 px-3 py-2">Since</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($lestrsus as $lestrsu)
                            <tr>
                                <td class="border border-gray-600 px-3 py-2">{{ $lestrsu->id }}</td>
                                <td class="border border-gray-600 px-3 py-2">
                                    {{ $lestrsu->level->name }}</td>
                                <td class="border border-gray-600 px-3 py-2">
                                    {{ $lestrsu->stream->name }}</td>
                                <td class="border border-gray-600 px-3 py-2">
                                    {{ $lestrsu->subject->name }}</td>
                                <td class="border border-gray-600 px-3 py-2">
                                    {{ $lestrsu->created_at->format('Y/m/d') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <div class="bg-blue-200 text-blue-700 px-3 py-2 rounded flex items-center">
                        <img width="32" src="{{ asset('/icons/info.svg') }}" alt="Info Icon">
                        <span>No subjects allocated to you!!</span>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-teacher-layout>