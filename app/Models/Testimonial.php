<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{

    use HasFactory;

    // Kolom yang boleh diisi
    protected $fillable = [
        'user_id',
        'course_id',
        'username',
        'content',
        'rating',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
