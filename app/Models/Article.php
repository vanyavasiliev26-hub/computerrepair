<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'content', 'image', 'is_active', 'published_at'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'published_at' => 'date'
    ];

    public function getFormattedDateAttribute()
    {
        return $this->published_at ? $this->published_at->format('d.m.Y') : $this->created_at->format('d.m.Y');
    }
}