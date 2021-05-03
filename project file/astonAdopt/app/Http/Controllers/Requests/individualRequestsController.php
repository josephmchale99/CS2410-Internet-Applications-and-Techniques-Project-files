<?php

namespace App\Http\Controllers\Requests;

use App\Models\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Animals;

class individualRequestsController extends Controller
{
  public function index(){

    $reqs = Requests::where('user_id', '=', auth()->user()->id)->get();

    return view('requests.individualRequests', [
      'reqs' => $reqs
    ]);
  }

  public function details($id){
    $animal = Animals::find($id);
    return view('requests.individualRequestsDetails', compact('animal'));

  }

  public function destroy($id){
    $del = Requests::where('user_id', '=', auth()->user()->id)->where('animals_id', '=', $id)->delete();
    return redirect()->route('individualRequests');
  }




}
