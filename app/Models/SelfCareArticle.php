<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SelfCareArticle extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'author',
        'published_at',
    ];
}
