<?php

namespace App\Http\Controllers\Accounts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index(){
      return view('accounts.register');
    }

    public function __construct(){
      $this->middleware(['guest']);
    }

    public function store(Request $request){
      $this -> validate($request, [
        'name' => ['required', 'max:255'],
        'email' => ['required', 'max:255', 'email'],
        'username' => ['required', 'max:255'],
        'password' => ['required', 'confirmed']
      ]);

      User::create([
        'name' => $request->name,
        'email' => $request->email,
        'username' => $request->username,
        'password' => Hash::make($request->password),

      ]);

      auth()->attempt($request->only('email', 'password'));

      return redirect()->route('home');

    }
}
