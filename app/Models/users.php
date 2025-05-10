<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class users extends Model
{
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $table = 'users';
    protected $primaryKey = 'id';

    // Protect the password field when retrieving the model from the database
    protected $hidden = [
        'password',
    ];
}
