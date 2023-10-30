<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AkarKuadratGolang extends Model
{
    use HasFactory;

    protected $table = 'calculates';

    protected $fillable = [
        'user',
        'number',
        'akarkuadrat',
        'excecution'
    ];
}
