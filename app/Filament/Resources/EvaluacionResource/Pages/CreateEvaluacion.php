<?php

namespace App\Filament\Resources\EvaluacionResource\Pages;

use App\Filament\Resources\EvaluacionResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateEvaluacion extends CreateRecord
{
    protected static string $resource = EvaluacionResource::class;

    protected function beforeCreate(array $data): void
    {
        if (\App\Models\Evaluacion::where('user_id', auth()->id())->exists()) {
            $this->notify('danger', 'Ya has registrado una evaluación.');
            abort(403, 'No puedes crear más de una evaluación.');
        }
    }
}
