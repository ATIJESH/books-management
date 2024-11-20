<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'book_id',
        'comment'
        // 'rating'
    ];

    // Relationship with the Book model
    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    // Relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
