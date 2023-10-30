<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AkarKuadratSql extends Model
{
    use HasFactory;

    protected $table = 'calculates_plsql';

    protected $fillable = [
        'user',
        'number',
        'akarkuadrat',
        'excecution'
    ];
}
