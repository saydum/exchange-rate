<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Valute extends Model
{
    use HasFactory;

    protected $table = "valutes";

    protected $fillable = [
        'name',
        'char_code',
        'valute',
        'nominal',
    ];

}

