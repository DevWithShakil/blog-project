<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'user_id',
        'title',
        'slug',
        'content',
        'image',
        'status',
        'published_at'
    ];

    protected function casts(): array
{
    return [
        'published_at' => 'datetime',
    ];
}

    // Relationship: Post belongs to Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Relationship: Post belongs to User (Author)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
