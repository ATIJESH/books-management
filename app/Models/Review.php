<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    // Fillable fields
    protected $fillable = ['book_id', 'user_id', 'rating', 'comment'];

    // Define relationship with Book
    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    // Define relationship with User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
