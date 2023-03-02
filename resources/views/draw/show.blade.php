@extends('home')

@section('content')
    
    <div class="overflow-x-auto">

        <div class="h-max flex items-center justify-center font-sans overflow-hidden">

            <div class="w-full lg:w-5/6">
                <div class="mb-0 px-4 pt-4 mt-4">
                    <div class="relative w-full px-4 mb-4 max-w-full flex-grow flex-1">
                        <h3 class="font-bold text-xl text-gray-800">RESULT</h3>
                    </div>
                    <div class="flex flex-wrap items-center">
                        <div>
                            <input class="w-full rounded-md bg-white pl-2 py-1 px-1 text-base font-medium text-[#6B7280] outline-none focus:shadow-md search-input" placeholder="Search" type="search" data-table="filter-result"/>
                        </div>
                        <div class="relative w-full px-4 max-w-full flex-grow flex-1 text-right">
                            <select id="id_draw" class="select select-bordered w-full max-w-xs rounded px-3 py-1" onchange="modifyUrl(this.value)">
                                @foreach($oldDraws as $draw)
                                    <option value="{{ $draw['id_draw'] }}">ID: {{ $draw['id_draw'] ." - DATE: ". $draw['date_of_draw'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="bg-white shadow-md rounded my-6">
                    <table id="result" class="filter-result min-w-max w-full table-auto ">
                        <thead>
                            <tr class="bg-gray-200 text-gray-600 text-sm leading-normal">
                                <th class="py-3 px-6 text-left cursor-pointer" onclick="sortTable('result', 0)">ID / ID LOSOWANIA</th>
                                <th class="py-3 px-6 text-left cursor-pointer" onclick="sortTable('result', 1, 'date')">DATA</th>
                                <th class="py-3 px-6 text-left cursor-pointer" onclick="sortTable('result', 2)">OSOBA LOSUJĄCA</th>
                                <th class="py-3 px-6 text-left cursor-pointer" onclick="sortTable('result', 3)">OSOBA WYLOSOWANA</th>
                                <th class="py-3 px-6 text-center cursor-pointer" onclick="sortTable('result', 4)">IS ACTIVE</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm font-light">
                        @foreach($result as $value)
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 px-6 text-left whitespace-nowrap">
                                    <span class="font-medium">{{ $value->id ." / ". $value->id_draw }}</span>
                                </td>
                                <td class="py-3 px-6 text-left whitespace-nowrap">
                                    <span class="font-medium">{{ $value->date_of_draw }}</span>
                                </td>
                                <td class="py-3 px-6 text-left">
                                    <span class="font-medium">{{ $value->person_drawing_name }}</span>
                                </td>
                                <td class="py-3 px-6 text-left">
                                    <span class="font-medium">{{ $value->selected_person_name }}</span>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <span class="font-medium">{{ $value->is_active }}</span>
                                </td> 
                            </tr>
                        @endforeach
                        </tbody>
                    <table>
                </div>

                {{-- Skrypt do zamykania alertu --}}
                <script src="{{ asset('js/modifyUrl.js') }}"></script>
                {{-- Skrypt do filtrowania tabeli --}}
                <script src="{{ asset('js/filterTable.js') }}"></script>
                {{-- Skrypt do sortowania tabeli --}}
                <script src="{{ asset('js/sortTable.js') }}"></script>
            </div>
        </div>
    </div>
@endsection