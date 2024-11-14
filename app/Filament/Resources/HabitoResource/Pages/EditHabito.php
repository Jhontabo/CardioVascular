<?php

namespace App\Filament\Resources\HabitoResource\Pages;

use App\Filament\Resources\HabitoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHabito extends EditRecord
{
    protected static string $resource = HabitoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
