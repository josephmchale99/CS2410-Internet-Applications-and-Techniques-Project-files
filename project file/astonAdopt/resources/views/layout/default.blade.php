<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <title>Aston Animal Sanctuary</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"/>
  </head>
  <body class="bg-gray-200">
    <nav class="flex justify-between p-4 mb-4 bg-gray-600 text-gray-200">
      <ul class="flex items-center">
        <li>
          <a href="{{ route('home') }}" class="p-4">Aston Animal Sanctuary</a>
        </li>
        @auth
          <li>
            <a href="{{ route('adoption') }}" class="p-4">Adoption</a>
          </li>

          <li>
            <a href="{{ route('individualRequests') }}" class="p-4">My requests</a>
          </li>

        
          @if (auth()->user()->staff() ===1 )
            <li>
              <a href="{{ route('animal') }}" class="p-4">Add Animals</a>
            </li>
            <li>
              <a href="{{ route('allRequests') }}" class="p-4">All Requests</a>
            </li>

          @endif

        @endauth


      </ul>

      <ul class="flex items-center">

        @guest
          <li>
            <a href="{{ route('register') }}" class="p-4">Register</a>
          </li>
          <li>
            <a href="{{ route('login') }}" class="p-4">Login</a>
          </li>
        @endguest
        @auth
          <li>
            <a href="" class="p-4">{{ auth()->user()->name }}</a>
          </li>
          <li>
            <form action="{{ route('logout') }}" method="post">
              @csrf
              <button type="submit" class="">Logout</button>
            </form>
          </li>
        @endauth

      </ul>
    </nav>

    @yield('content')

  </body>
</html>
