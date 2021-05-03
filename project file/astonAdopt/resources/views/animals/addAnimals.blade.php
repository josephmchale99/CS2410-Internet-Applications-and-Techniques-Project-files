@extends('layout.default')

@section('content')
<div class="flex justify-center">
  <div class="rounded-lg w-1/2 bg-gray-600 p-4">

    <h1 class="text-gray-200 text-center mb-4 text-xl font-bold">Add Animal</h>

    <form action="{{ route('animal') }}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="mb-4 mt-4 ">
        <label for="name" class="sr-only">Name</label>
        <input type="text" name="name" id="name" placeholder="Animal's Name" class="w-full rounded-lg p-4 bg-gray-200 border-1 text-black"
        value="{{ old('name') }}"/>
        @error('name')
          <div class="text-red-500 mt-2">
            {{ $message }}
          </div>
        @enderror
      </div>

      <div class="mb-4 ">
        <label for="type" class="sr-only">dob</label>
        <input type="text" name="type" id="type" placeholder="Animal's type" class="w-full rounded-lg p-4 bg-gray-200 border-1 text-black"
        value="{{ old('type') }}"/>
        @error('type')
          <div class="text-red-500 mt-2">
            {{ $message }}
          </div>
        @enderror
      </div>

      <div class="mb-4 ">
        <label for="dob">Animals Date of Birth</label>
        <input type="date" name="dob" id="dob" placeholder="Animal's date of birth" class="w-full rounded-lg p-4 bg-gray-200 border-1 text-black mt-4"
        value="{{ old('dob') }}"/>
        @error('dob')
          <div class="text-red-500 mt-2">
            {{ $message }}
          </div>
        @enderror
      </div>

      <div class="mb-4">
        <label for="desc" class="sr-only">Animal Description</label>
        <textarea name="desc" id="desc" cols="40" rows="6" placeholder="Animals Description" class="w-full rounded-lg p-4 bg-gray-200 border-1 text-black mt-4"
        value="{{ old('desc') }}"></textarea>
        @error('desc')
          <div class="text-red-500 mt-2">
            {{ $message }}
          </div>
        @enderror
      </div>

      <div class="mb-4 ">
        <label for="desc">Image of Animal</label>
        <input type="file" name="image" placeholder="Image file" class="w-full rounded-lg p-4 bg-gray-200 border-1 text-black mt-4"/>
        @error('image')
          <div class="text-red-500 mt-2">
            {{ $message }}
          </div>
        @enderror
      </div>

      <div class="mb-4">
        <button type="submit" class="px-4 py-3 bg-blue-500 w-full text-black rounded">Add Animal</button>
      </div>


    </form>
  </div>
</div>
@endsection
