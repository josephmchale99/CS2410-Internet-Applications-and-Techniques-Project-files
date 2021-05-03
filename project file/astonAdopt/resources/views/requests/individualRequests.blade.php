@extends('layout.default')

@section('content')
<div class="flex justify-center">
  <div class="rounded-lg w-3/4 bg-gray-600 p-4">
    <h1 class="text-gray-200 text-center mb-4 text-xl font-bold">My requests</h>

      <table class="table-auto w-full bg-black mt-4">
        <thread class="bg-black">
          <tr>
            <th>Name</th>
            <th>Type</th>
            <th>Pending</th>
            <th>Been confirmed</th>
            <th>Action</th>
          </tr>
        </thread>
        <tbody class="bg-gray-200 text-black">
          @foreach($reqs as $req)
            <tr>
              <td>{{ (($req->getAnimal($req->animals_id))->get(0))->name }}</td>
              <td>{{ (($req->getAnimal($req->animals_id))->get(0))->type }}</td>
              <td>
                @if ($req->pending === 1)
                  Yes
                @elseif ($req->pending === 0)
                  No
                @else
                  N/A
                @endif
              </td>
              <td>
                @if ($req->confirmed === null)
                  No
                @elseif ($req->confirmed === 1)
                  Allowed/Confirmed
                @elseif ($req->confirmed === 0)
                  Not Allowed/Denied
                @else
                  N/A
                @endif
              </td>
              <td><a href="{{route('individualRequests.details', [$req->animals_id] )}}" >Details</a></td>
            </tr>
          @endforeach
      </table>


  </div>
</div>
@endsection
