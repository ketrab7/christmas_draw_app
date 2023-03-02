@extends('home')

@section('content')

<div class="justify-center max-w-sm w-full lg:max-w-full lg:flex mt-4">
  <div class="border border-gray-300 bg-white rounded p-4 flex flex-col leading-normal">

    <h3 class="font-bold text-base text-gray-800 mb-1">Edit group (id: {{ $group->id }})</h3>
    <hr/>

    <form action="{{ route('group.update', $group->id) }}" method="POST">
      @csrf
      @method('PATCH')
      
      <div class="mt-3 mb-5">
        <x-label :for="'name'">Name <span class="text-red-600">*</span></x-label>
        <x-input-text :name="'name'" :value=" $group->name "/>
        @error('name')
          <span class="mb-1 font-bold text-base font-medium text-red-600">Please complete the details!</span>
        @enderror
      </div>

      <div class="mb-5">
        <x-label :for="'description'">Description</x-label>
        <x-input-text :name="'description'" :value=" $group->description "/>
      </div>
      
      <div class="mb-5">
        <x-label :for="'isActive'">Is active</x-label>
        <x-input-radio :name="'isActive'" :value="'N'" :checked=" $group->isActive ">N</x-input-radio>
        <x-input-radio :name="'isActive'" :value="'Y'" :checked=" $group->isActive ">Y</x-input-radio>
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
<x-link :href=" route('group.index') ">Return to groups</x-link>

@endsection