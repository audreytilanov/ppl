<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AkarKuadrat extends Model
{
    use HasFactory;

    protected $table = 'calculates_laravel';

    protected $fillable = [
        'user',
        'number',
        'akarkuadrat',
        'excecution'
    ];
}
