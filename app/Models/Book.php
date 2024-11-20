<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $table = 'books';

    protected $fillable = [
        'title',
        'author',
        'description',
        'rating',
        'book_front_img',
        'book_back_img'
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public function reviews()
    {
        return $this->hasMany(Review::class);  // Make sure Review is the correct model name
    }

    // Method to calculate the average rating
    public function calculateAverageRating()
    {
        return $this->comments()->avg('rating');
    }
}
