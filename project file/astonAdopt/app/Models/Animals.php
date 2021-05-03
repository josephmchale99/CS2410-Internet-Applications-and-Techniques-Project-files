<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Requests;
use App\Models\User;

class Animals extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'dob',
        'type',
        'desc',
        'image',
    ];

    public function requests(){
      return $this->hasMany(Requests::class);
    }

    public function requestedBy(User $user){
      return $this->requests->contains('user_id', $user->id);
    }






}
