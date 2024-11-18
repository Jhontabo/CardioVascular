<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Habito extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'actividad_fisica',
        'horas_suenio',
        'hidratacion',
        'fecha',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
