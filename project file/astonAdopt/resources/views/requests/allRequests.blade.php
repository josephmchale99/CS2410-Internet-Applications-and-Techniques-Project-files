@extends('layout.default')

@section('content')
<div class="flex justify-center">
  <div class="rounded-lg w-3/4 bg-gray-600 p-4">
    <h1 class="text-gray-200 text-center mb-4 text-2xl font-bold">All requests</h>

      <h2 class="text-gray-200 text-center mb-4 text-xl font-bold"> Pending Requests:</h>
      <table class="table-auto w-full bg-black mt-4">
        <thread class="bg-black">
          <tr>
            <th>User Name</th>
            <th>Animal Name</th>
            <th>Pending</th>
            <th>Been confirmed</th>
            <th>Action</th>
          </tr>
        </thread>
        @foreach($pens as $pen)
        <tbody class="bg-gray-200 text-black">
          <tr>
            <td>{{ (($pen->getUser($pen->user_id))->get(0))->name }}</td>
            <td>{{ (($pen->getAnimal($pen->animals_id))->get(0))->name }}</td>
            <td>
              @if ($pen->pending === 1)
                Yes
              @elseif ($pen->pending === 0)
                No
              @else
                N/A
              @endif
            </td>
            <td>
              @if ($pen->confirmed === null)
                No
              @elseif ($pen->confirmed === 1)
                Allowed/Confirmed
              @elseif ($pen->confirmed === 0)
                Not Allowed/Denied
              @else
                N/A
              @endif
            </td>
            <td><a href="{{route('allRequests.detailsP', ['id'=>$pen->animals_id, 'uid'=>$pen->user_id] )}}" >Details</a></td>
          </tr>
          @endforeach
      </table>


      <h2 class="text-gray-200 text-center mb-4 text-xl font-bold"> Confirmed Requests:</h>
      <table class="table-auto w-full bg-black mt-4">
        <thread class="bg-black">
          <tr>
            <th>User Name</th>
            <th>Animal Name</th>
            <th>Pending</th>
            <th>Been confirmed</th>
            <th>Action</th>
          </tr>
        </thread>

        @if($npens->isNotEmpty())
        @foreach($npens as $npen)
        <tbody class="bg-gray-200 text-black">
          <tr>
            <td>{{ (($npen->getUser($npen->user_id))->get(0))->name }}</td>
            <td>{{ (($npen->getAnimal($npen->animals_id))->get(0))->name }}</td>
            <td>
              @if ($npen->pending === 1)
                Yes
              @elseif ($npen->pending === 0)
                No
              @else
                N/A
              @endif
            </td>
            <td>
              @if ($npen->confirmed === null)
                No
              @elseif ($npen->confirmed === 1)
                Allowed/Confirmed
              @elseif ($npen->confirmed === 0)
                Not Allowed/Denied
              @else
                N/A
              @endif
            </td>
            <td><a href="{{route('allRequests.detailsC', [$npen->animals_id, 'uid'=>$npen->user_id] )}}" >Details</a></td>
          </tr>
          @endforeach
        @else
        <tbody class="bg-gray-200 text-black">
          <tr>
            <td>N/A</td>
            <td>N/A</td>
            <td>N/A</td>
            <td>N/A</td>
            <td><a href="" >N/A</a></td>
          </tr>

        @endif
      </table>


  </div>
</div>
@endsection
