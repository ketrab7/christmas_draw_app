@extends('home')

@section('content')
    
    <div class="overflow-x-auto">

        {{-- alert --}}
        @if( session()->get('alert') )
            <x-alert>{{ session()->get('alert') }}</x-alert>
        @endif

        <div class="h-max flex items-center justify-center font-sans overflow-hidden">

            <div class="w-full lg:w-5/6">
                <div class="mb-0 px-4 pt-4 mt-4 mb-4">
                    <div class="flex flex-wrap items-center">
                        <div class="relative w-full px-4 max-w-full">
                            <h3 class="font-bold text-xl text-gray-800">Czas na losowanie...</h3>
                        </div>
                        <div class="relative w-full px-4 mt-4 max-w-full">
                            <p class="font-bold text-base text-gray-800">Instrukcja losowania:</p>
                            <p class="font-bold text-sm text-gray-800 mt-1">1. Należy wybrać przycisk ze swoim imieniem.</p>
                            <p class="font-bold text-sm text-gray-800">2. Otworzy się okienko z imieniem osoby wylosowanej, po przeczytaniu należy je zamknąć klikając w X.</p>
                            <p class="font-bold text-sm text-gray-800">3. Wylosowanej osobie trzeba kupić duuużo prezentów. :) </p>
                            <p class="font-bold text-sm text-gray-800 mt-2">Powodzenia! </p>
                        </div>
                    </div>
                </div>

                <div class="justify-center max-w-sm w-full lg:max-w-full lg:flex mt-4">
                @foreach($people as $person)
                    <a href="/dashboard/{{ $person->id }}/show" 
                        class="text-white text-s font-bold px-3 py-1 rounded outline-none mr-1
                            {{ in_array($person->id, $peopleWhoCanDraw) ? 'bg-gray-800' : 'pointer-events-none cursor-default bg-gray-600' }}" 
                        type="button"
                    >
                            {{ $person->firstName }}
                    </a>
                @endforeach
                </div>

                {{-- alert --}}
                @if( session()->get('message') )
                    <div class="grid justify-center grid-rows-1">
                        <div class="text-white px-3 py-3 border-0 flex items-center w-full max-w-xs bg-white rounded-lg shadow relative mb-4 mt-4 bg-red-500">
                            <span class="inline-block align-middle mr-8">
                                Wylosowałeś: <b class="capitalize">{{ session()->get('message') }}</b> 
                            </span>
                            <button class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-2 mr-3 outline-none focus:outline-none" onclick="closeAlert(event)">
                                <span> ×</span>
                            </button>
                        </div>
                    </div>

                    {{-- Skrypt do zamykania alertu --}}
                    <script src="{{ asset('js/closeAlert.js') }}"></script>
                @endif

            </div>
        </div>
    </div>
@endsection