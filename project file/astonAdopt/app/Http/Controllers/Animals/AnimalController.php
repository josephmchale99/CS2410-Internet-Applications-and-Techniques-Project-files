<?php

namespace App\Http\Controllers\Animals;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Animals;
use App\Models\User;

class AnimalController extends Controller
{
  


  public function index(){
    return view('animals.addAnimals');
  }

  public function store(Request $request){

    $this -> validate($request, [
      'name' => ['required', 'max:255'],
      'dob' => ['required', 'before:now', 'after_or_equal:01/01/1971'],
      'type' => ['required', 'max:30'],
      'desc' => ['required', 'max:255'],
      'image' => ['sometimes', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:1024'],
    ]);

    //the code block below is from the laracarent lab, from 'VechicleController.php' to save an image to storage
    if ($request->hasFile('image')){
        $fileNameWithExt = $request->file('image')->getClientOriginalName();
        $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('image')->getClientOriginalExtension();
        $fileNameToStore = $filename.'_'.time().'.'.$extension;
        $path = $request->file('image')->storeAs('public/images', $fileNameToStore);
        }
        else {
          $fileNameToStore = 'noimage.jpg';
    }
    //end of code block

    Animals::create([
      'name' => $request->name,
      'dob' => $request->dob,
      'type' => $request->type,
      'desc' => $request->desc,
      'image' => $fileNameToStore,
    ]);


    return redirect()->route('home');
  }

  public function details($id){
    $animal = Animals::find($id);
    return view('animals.animalDetails', compact('animal'));

  }

}
