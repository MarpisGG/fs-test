<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'slug',
        'image',
        'created_at',
    ];

    protected $table = 'blog';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $casts = [
        'slug' => 'string',
    ];
}
