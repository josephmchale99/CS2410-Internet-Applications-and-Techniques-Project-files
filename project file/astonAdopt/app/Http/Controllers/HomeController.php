<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animals;

class HomeController extends Controller
{
  public function index(){

    $animals = Animals::get();

    return view('home', [
      'animals' => $animals
    ]);


  }
}
