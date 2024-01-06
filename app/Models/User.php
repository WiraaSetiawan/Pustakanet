<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Model implements Authenticatable
{
    use AuthenticatableTrait;

    protected $fillable = ['username', 'password','email', 'as', 'phone_number', 'address'];


    public function borrows()
    {
        return $this->hasMany(Borrow::class);
    }

    protected $attributes = [
      'as'=>'client',
    ];
   
}