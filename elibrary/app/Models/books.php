<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BookBorrow;

class books extends Model
{
    use HasFactory;
    protected $table = 'books';
    protected $primaryKey = 'book_id';

    public function bookBorrows()
    {
        return $this->hasMany(BookBorrow::class);
    }
}
