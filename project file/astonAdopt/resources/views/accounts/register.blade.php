@extends('layout.default')

@section('content')
  <div class="flex justify-center">
    <div class="rounded-lg w-1/2 bg-gray-600 p-4">
      <h1 class="text-gray-200 text-center mb-4 text-xl font-bold">Registration</h>

      <form action="{{ route('register') }}" method="post">
        @csrf
        <div class="mb-4 mt-4 ">
          <label for="name" class="sr-only">Name</label>
          <input type="text" name="name" id="name" placeholder="Name" class="w-full rounded-lg p-4 bg-gray-200 border-1 text-black
          @error('name') border-red-500 @enderror"  value="{{ old('name') }}"/>
          @error('name')
            <div class="text-red-500 mt-2">
              {{ $message }}
            </div>
          @enderror
        </div>

        <div class="mb-4">
          <label for="email" class="sr-only">Email</label>
          <input type="email" name="email" id="email" placeholder="Email" class="w-full rounded-lg p-4 bg-gray-200 border-1 text-black
          @error('email') border-red-500 @enderror"  value="{{ old('email') }}"/>
          @error('email')
            <div class="text-red-500 mt-2">
              {{ $message }}
            </div>
          @enderror
        </div>

        <div class="mb-4">
          <label for="username" class="sr-only">Username</label>
          <input type="text" name="username" id="username" placeholder="Username" class="w-full rounded-lg p-4 bg-gray-200 border-1 text-black
          @error('username') border-red-500 @enderror"  value="{{ old('username') }}"/>
          @error('username')
            <div class="text-red-500 mt-2">
              {{ $message }}
            </div>
          @enderror
        </div>

        <div class="mb-4">
          <label for="password" class="sr-only">Password</label>
          <input type="password" name="password" id="password" placeholder="Password" class="w-full rounded-lg p-4 bg-gray-200 border-1 text-black
          @error('name') border-red-500 @enderror"  value=""/>
          @error('password')
            <div class="text-red-500 mt-2">
              {{ $message }}
            </div>
          @enderror
        </div>

        <div class="mb-4">
          <label for="password_confirmation" class="sr-only">Password</label>
          <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Password Confirmation" class="w-full rounded-lg p-4 bg-gray-200 border-1 text-black"  value=""/>
        </div>

        <div class="mb-4">
          <button type="submit" class="px-4 py-3 bg-blue-500 w-full text-black rounded">Register</button>
        </div>
      </form>
    </div>
  </div>
@endsection
