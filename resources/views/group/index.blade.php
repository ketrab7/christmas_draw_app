@extends('home')

@section('content')
    
    <div class="overflow-x-auto">

        {{-- alert --}}
        @if( session()->get('alert') )
            <x-alert>{{ session()->get('alert') }}</x-alert>
        @endif

        <div class="h-max flex items-center justify-center font-sans overflow-hidden">

            <div class="w-full lg:w-5/6">
                <div class="mb-0 px-4 pt-4 mt-4">
                    <div class="relative w-full px-4 mb-4 max-w-full flex-grow flex-1">
                        <h3 class="font-bold text-xl text-gray-800">ALL GROUPS</h3>
                    </div>
                    <div class="flex flex-wrap items-center">
                        <div>
                            <input class="w-full rounded-md bg-white pl-2 py-1 px-1 text-base font-medium text-[#6B7280] outline-none focus:shadow-md search-input" placeholder="Search" type="search" data-table="filter-groups"/>
                        </div>
                        <div class="relative w-full px-4 max-w-full flex-grow flex-1 text-right">
                            <a href="{{ route('group.create') }}" class="bg-gray-800 text-white text-s font-bold px-3 py-1 rounded outline-none mr-1" type="button">ADD GROUP</a>
                        </div>
                    </div>
                </div>

                <div class="bg-white shadow-md rounded my-6">
                    <table id="groups" class="filter-groups min-w-max w-full table-auto">
                        <thead>
                            <tr class="bg-gray-200 text-gray-600 text-sm leading-normal">
                                <th class="py-3 px-6 text-left cursor-pointer" onclick="sortTable('groups', 0)">ID</th>
                                <th class="py-3 px-6 text-left cursor-pointer" onclick="sortTable('groups', 1)">NAME</th>
                                <th class="py-3 px-6 text-left cursor-pointer" onclick="sortTable('groups', 2)">DESCRIPTION</th>
                                <th class="py-3 px-6 text-center cursor-pointer" onclick="sortTable('groups', 3)">IS ACTIVE</th>
                                <th class="py-3 px-6 text-center">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm font-light">
                            @foreach($groups as $value)
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 px-6 text-left whitespace-nowrap">
                                    <span class="font-medium">{{ $value->id }}</span>
                                </td>
                                <td class="py-3 px-6 text-left">
                                    <span class="font-medium">{{ $value->name }}</span>
                                </td>
                                <td class="py-3 px-6 text-left">
                                    <span class="font-medium">{{ $value->description }}</span>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <span class="font-medium">{{ $value->isActive }}</span>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <div class="flex item-center justify-center">
                                        <a href="/group/{{ $value->id }}/relog" class="mr-2 text-sm bg-blue-600 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Relog</a>
                                        <a href="{{ route('group.edit', $value->id) }}" class="mr-2 text-sm bg-green-600 hover:bg-green-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Edit</a>
                                        {{-- delete group --}}
                                        <form action="{{ route('group.destroy', $value->id) }}" method="POST" onsubmit="confirm('Are you sure?')">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Delete</button>
                                        </form>
                                        
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    <table>
                    {{ $groups->links('pagination::tailwind') }}
                </div>
                
                {{-- Skrypt do filtrowania tabeli --}}
                <script src="{{ asset('js/filterTable.js') }}"></script>
                {{-- Skrypt do sortowania tabeli --}}
                <script src="{{ asset('js/sortTable.js') }}"></script>
            </div>
        </div>
    </div>

    
@endsection