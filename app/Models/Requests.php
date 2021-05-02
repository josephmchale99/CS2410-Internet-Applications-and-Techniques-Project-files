<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Animals;

class Requests extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'animals_id',
        'pending',
        'confirmed',
    ];

    public function getAnimal($id){
      $animal = Animals::where('id', '=', $id)->get();
      return $animal;
    }

    public function getUser($id){
      $user = User::where('id', '=', $id)->get();
      return $user;
    }

}
