<?php

namespace App\Http\Controllers\Adoption;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Animals;
use App\Models\Requests;

class AdoptionController extends Controller
{
  public function index(){
    $animals = Animals::where('available', '=', 1)->get();

    return view('adoption.adoption', [
      'animals' => $animals
    ]);
  }

  public function details($id){
    $animal = Animals::find($id);
    return view('adoption.adoptionDetails', compact('animal'));
  }


  public function request(Animals $animal){

    $animal->requests()->create([
      'user_id' => auth()->user()->id,
    ]);

    return redirect()->route('adoption');
  }




}
