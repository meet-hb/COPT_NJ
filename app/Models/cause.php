<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cause extends Model
{
    use HasFactory;
    protected $fillable = [
        'treatment_id',
        'name',
        'description',
    ];
}