<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens; // Import the HasApiTokens trait

class Admin extends Model
{

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $table = 'admin'; // If your table is named 'admin'
    protected $primaryKey = 'id';

    // Protect the password field when retrieving the model from the database
    protected $hidden = [
        'password',
    ];
}