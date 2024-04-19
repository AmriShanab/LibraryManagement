<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Notifications\Notifiable;
use App\Models\BookBorrow;

class User extends Authenticable
{
    use HasFactory, Notifiable;

    public function bookBorrows()
    {
        return $this->hasMany(BookBorrow::class);
    }

    protected $fillable = [
        'name', 'email', 'password', 'user_type', // Add 'user_type' here
    ];
    
}
