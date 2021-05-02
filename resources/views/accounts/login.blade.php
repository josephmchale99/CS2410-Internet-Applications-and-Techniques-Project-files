@extends('layout.default')

@section('content')
<div class="flex justify-center">
  <div class="rounded-lg w-1/2 bg-gray-600 p-4">
    <h1 class="text-gray-200 text-center mb-4 text-xl font-bold">Login</h>

    @if (session('status'))
      <div class="p-4 mb-4 mt-4 bg-red-500 text-black text-center rounded-lg">
          {{ session('status') }}
      </div>
    @endif

    <form action="{{ route('login') }}" method="post">
      @csrf
      <div class="mb-4 mt-4">
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
          <div class="flex items-center">
            <input type="checkbox" name="remember" id="remember" class="mr-2 text-gray-200">
            <label for="remember">Remember me</label>
          </div>
        </div>

      <div class="mb-4">
        <button type="submit" class="px-4 py-3 bg-blue-500 w-full text-black rounded">Login</button>
      </div>

    </form>

  </div>
</div>
@endsection
