@extends('layout.default')

@section('content')
<div class="flex justify-center">
  <div class="rounded-lg w-3/4 bg-gray-600 p-4">
    <h1 class="text-gray-200 text-center mb-4 text-xl font-bold">Details</h>


      <table class="table-auto w-1/2 bg-black mt-4 border border-gray-200">
          <tr>
            <td class="border border-gray-200"> Name </th> <td class="border border-gray-200"> {{ $animal->name }}</td>
          </tr>
          <tr>
            <td class="border border-gray-200"> Date of Birth </th> <td class="border border-gray-200"> {{ $animal->dob }}</td>
          </tr>
          <tr>
            <td class="border border-gray-200"> Type </th> <td class="border border-gray-200"> {{ $animal->type }}</td>
          </tr>
          <tr>
            <td class="border border-gray-200"> Description </th> <td class="border border-gray-200"> {{ $animal->desc }}</td>
          </tr>
          <tr>
            <td class="border border-gray-200" colspan='2'> <img class="" src="{{ asset('storage/images/'.$animal->image)}}"/> </td>
          </tr>
      </table>

      <form action="{{route('allRequests.detailsC', ['id'=>$animal->id, 'uid'=>$user->id] )}}" method="post">
        @csrf
        @method('delete')
        <div class="mb-4">
          <button type="submit" class="px-4 py-3 bg-blue-500 w-1/4 text-black rounded mt-4 mb-4">Cancel Confirmation</button>
        </div>
      </form>

      <a href="{{route('allRequests')}}" >Go back</a>
  </div>
</div>
@endsection
