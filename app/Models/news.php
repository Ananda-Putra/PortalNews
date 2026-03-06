<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class news extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'content', 'image', 'excerpt'];

    // Mutator untuk membuat slug otomatis dari title (opsional)
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($news) {
            $news->slug = Str::slug($news->title);
        });
        static::updating(function ($news) {
            $news->slug = Str::slug($news->title);
        });
    }
}
