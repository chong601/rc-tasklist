<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    // Define fillable fields for this model
    protected $fillable = [
        'name',
        'deadline',
        'completed'
    ];

    
    protected $casts = [
        'deadline' => 'datetime',
        'completed' => 'datetime',
    ];
}
