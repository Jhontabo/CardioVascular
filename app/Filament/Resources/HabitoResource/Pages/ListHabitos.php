<?php

namespace App\Filament\Resources\HabitoResource\Pages;

use App\Filament\Resources\HabitoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHabitos extends ListRecords
{
    protected static string $resource = HabitoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
