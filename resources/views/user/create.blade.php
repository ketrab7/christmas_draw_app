@extends('home')

@section('content')

<div class="justify-center max-w-sm w-full lg:max-w-full lg:flex mt-4">
  <div class="border border-gray-300 bg-white rounded p-4 flex flex-col leading-normal">

    <h3 class="font-bold text-lg text-gray-800 mb-1">Create new User</h3>
    <hr/>

    <form action="{{ route('user.store') }}" method="POST">
        @csrf

        <div class="grid grid-rows-1 grid-cols-2 gap-4 mt-3">
            <div>
                <x-label :for="'firstName'">First Name <span class="text-red-600">*</span></x-label>
                <x-input-text :name="'firstName'" :placeholder="'Enter your first name'"/>
            </div>
            <div>
                <x-label :for="'surname'">Surname</x-label>
                <x-input-text :name="'surname'" :placeholder="'Enter your surname'"/>
            </div>
        </div>
        @error('firstName')
            <span class="mb-1 font-bold text-base font-medium text-red-600">Please complete the details!</span>
        @enderror

        <div class="mt-5 mb-5">
            <x-label :for="'email'">E-mail</x-label>
            <x-input-text :name="'email'" :placeholder="'Enter your email'"/>
        </div>

        <div class="mb-5">
            <x-label>Groups:</x-label>
            @foreach($groups as $group)
            <div>
                <x-input-checkbox :id=" $group->id " :name="'groups[]'" :value=" $group->id "/>
                <x-label :for=" $group->id ">{{ $group->name .' (id: '. $group->id .')' }}</x-label>
            </div>
            @endforeach
        </div>

        <div class="mb-1">
            <button class="bg-gray-800 text-white text-s font-bold px-3 py-1 rounded outline-none mr-1">
                Submit
            </button>
        </div>
    </form>

  </div>
</div>

{{-- return to groups --}}
<x-link :href=" route('user.index') ">Return to Users</x-link>

@endsection