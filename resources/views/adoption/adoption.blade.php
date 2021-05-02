@extends('layout.default')

@section('content')
<div class="flex justify-center">
  <div class="rounded-lg w-3/4 bg-gray-600 p-4">
    <h1 class="text-gray-200 text-center mb-4 text-xl font-bold">Adoption</h>

      <table class="table-auto w-full bg-black mt-4">
        <thread class="bg-black">
          <tr>
            <th>Name</th>
            <th>DOB</th>
            <th>Type</th>
            <th>Description</th>
            <th>Availability</th>
            <th>Action</th>
          </tr>
        </thread>
        <tbody class="bg-gray-200 text-black">
          @foreach($animals as $animal)
            <tr>
              <td>{{ $animal->name }}</td>
              <td>{{ $animal->dob }}</td>
              <td>{{ $animal->type }}</td>
              <td>{{ $animal->desc }}</td>
              <td>
                @if ($animal->available === 1)
                  Yes
                @elseif ($animal->available === 0)
                  No
                @else
                  N/A
                @endif
              </td>
              <td><a href="{{route('adoption.details', [$animal->id] )}}" >Details</a></td>
            </tr>
          @endforeach
        </tbody>
      </table>


  </div>
</div>
@endsection
