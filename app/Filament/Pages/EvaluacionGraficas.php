<?php

namespace App\Filament\Pages;

use App\Filament\Widgets\EvaluacionChartWidget;
use Filament\Pages\Page;

class EvaluacionGraficas extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.evaluacion-graficas';

    protected function getWidgets(): array
    {
        return [
            EvaluacionChartWidget::class,
        ];
    }

}
