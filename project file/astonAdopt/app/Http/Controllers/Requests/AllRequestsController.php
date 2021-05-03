<?php

namespace App\Http\Controllers\Requests;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Requests;
use App\Models\Animals;
use App\Models\User;

class AllRequestsController extends Controller
{
  public function index(){

    $pen = Requests::where('pending', '=', 1)->get();;

    $npen = Requests::where('pending', '=', 0)->get();;

    return view('requests.allRequests', [
      'pens' => $pen,
      'npens' => $npen,
    ]);

  }

  public function detailsP($id, $uid){
    $animal = Animals::find($id);
    $user = User::find($uid);
    return view('requests.allRequestsDetailsP', compact('animal'), compact('user'));
  }

  public function detailsC($id, $uid){
    $animal = Animals::find($id);
    $user = User::find($uid);
    return view('requests.allRequestsDetailsC', compact('animal'), compact('user'));

  }

  public function confirmation(Request $request, $id, $uid){
    $this -> validate($request, [
      'confirmed' => ['required'],
    ]);

    if ($request->confirmed === 'confirm'){
      $req = Requests::where('animals_id', '=', $id)->where('user_id', '=', $uid)->update(['confirmed' => 1, 'pending' => 0]);
      $animal = Animals::where('id', '=', $id)->update(['available' => 0, 'confirmAdopt' => 1]);
      $change = Requests::where('animals_id', '=', $id)->where('pending', '=', 1)->update(['confirmed' => 0, 'pending' => 0]);;

      return redirect()->route('allRequests');
    } else {
      $req = Requests::where('animals_id', '=', $id)->where('user_id', '=', $uid)->update(['confirmed' => 0, 'pending' => 0]);
      return redirect()->route('allRequests');
    }

  }

  public function cancellation($id, $uid){
    $req = Requests::where('animals_id', '=', $id)->where('user_id', '=', $uid)->update(['confirmed' => null, 'pending' => 1]);
    $animal = Animals::where('id', '=', $id)->update(['available' => 1, 'confirmAdopt' => 0]);
    return redirect()->route('allRequests');
  }


}
