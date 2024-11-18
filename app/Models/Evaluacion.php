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

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($evaluacion) {
            if (self::where('user_id', $evaluacion->user_id)->exists()) {
                throw new \Exception('Ya existe una evaluación para este usuario.');
            }
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
