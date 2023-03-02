{{-- navbar --}}
<nav class="flex justify-between bg-gray-900 text-white w-screen">
    <div class="px-5 xl:px-12 py-6 flex w-full items-center">
        <a class="text-3xl font-bold font-heading" href="/">
            Idą święta...
        </a>
        {{-- Nav Links --}}
        <div class="hidden md:flex px-4 mx-auto font-semibold font-heading space-x-12">
            <div><a href="/" type="button" class="hover:text-gray-200">Home</a></div>

            <div><button type="button" data-dropdown-toggle="Group" class="hover:text-gray-200">Groups/Users</button></div>
                {{-- Dropdown menu --}}
                <div class="hidden bg-white text-base z-50 list-none divide-y divide-gray-100 rounded shadow my-4" id="Group">
                    <ul class="py-1" aria-labelledby="dropdown">
                        <li>
                            <a href="{{ route('group.index') }}" class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2">Groups</a>
                        </li>
                        <li>
                            <a href="{{ route('user.index') }}" class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2">Users</a>
                        </li>
                    </ul>
                </div>
            
            <div><button type="button" data-dropdown-toggle="Draw" class="hover:text-gray-200">Draw</button></div>
                {{-- Dropdown menu --}}
                <div class="hidden bg-white text-base z-50 list-none divide-y divide-gray-100 rounded shadow my-4" id="Draw">
                    <ul class="py-1" aria-labelledby="dropdown">
                    <li>
                        <a href="/dashboard" class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2">Dashboard</a>
                    </li>
                    <hr/>
                    <li>
                        <a href="/draw" class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2">Draw</a>
                    </li>
                    <li>
                        <a href="/reset" class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2">Reset</a>
                    </li>
                    <hr/>
                    <li>
                        <a href="/result" class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2">Result</a>
                    </li>
                    </ul>
                </div>  

        </div>
        <!-- Header Icons -->
        <div class="hidden xl:flex items-center space-x-5 items-center">
            <a class="flex items-center hover:text-gray-200" href="#">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hover:text-gray-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </a>
        </div>
    </div>
</nav>