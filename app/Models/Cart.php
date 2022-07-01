<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id',
        'quantity',
        'price',
    ];
    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
