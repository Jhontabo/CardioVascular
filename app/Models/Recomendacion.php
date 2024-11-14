<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recomendacion extends Model
{
    use HasFactory;

    protected $table = 'recomendaciones'; // Nombre correcto de la tabla

    protected $fillable = [
        'user_id',
        'titulo',
        'descripcion',
        'tipo',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
