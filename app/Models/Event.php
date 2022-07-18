<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'category_id',
        'description',
        'datetime',
        'quota',
        'price',
        'location',
        'image',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function takeImage()
    {
        return '/storage/' . $this->image;
    }
}
