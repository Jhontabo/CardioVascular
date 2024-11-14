<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluacion extends Model
{
    use HasFactory;

    protected $table = 'evaluaciones'; // Nombre de la tabla

    protected $fillable = [
        'user_id',
        'edad',
        'peso',
        'altura',
        'sistolica',
        'diastolica',
        'colesterol',
        'antecedentes',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
