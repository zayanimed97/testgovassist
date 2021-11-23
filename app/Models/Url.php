<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    use HasFactory;

    protected $appends = ['short_url'];

    protected $fillable = ['destination', 'slug'];

    public function getShortUrlAttribute()
    {
        return url($this->slug);
    }
}
