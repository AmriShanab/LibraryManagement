<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class BookBorrow extends Model
{
    use HasFactory;
    protected $table = 'book_borrow';
    protected $fillable = ['title', 'book_id', 'user_id', 'borrow_date', 'return_date'];
    protected $primaryKey = 'id'; // Specify the primary key column name
    public $timestamps = false; 

    public function book()
    {
        return $this->belongsTo(books::class, 'book_id');    }

        public function user()
        {
            return $this->belongsTo(User::class, 'user_id');
        }
    
   
}
