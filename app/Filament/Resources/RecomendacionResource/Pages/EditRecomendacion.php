<?php

namespace App\Filament\Resources\RecomendacionResource\Pages;

use App\Filament\Resources\RecomendacionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRecomendacion extends EditRecord
{
    protected static string $resource = RecomendacionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
