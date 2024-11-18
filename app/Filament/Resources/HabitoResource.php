<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HabitoResource\Pages;
use App\Models\Habito;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;

class HabitoResource extends Resource
{
    protected static ?string $model = Habito::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Forms\Components\Hidden::make('user_id')
                    ->default(fn() => auth()->id())
                    ->required(),

                Forms\Components\DatePicker::make('fecha')
                    ->label('Fecha') // Valor predeterminado: fecha actual
                    ->required(),

                Forms\Components\TextInput::make('actividad_fisica')
                    ->required()
                    ->label('Minutos de actividad física'),

                Forms\Components\TextInput::make('horas_suenio')
                    ->required()
                    ->label('Horas promedio de sueño'),

                Forms\Components\TextInput::make('hidratacion')
                    ->required()
                    ->label('Vasos de agua al día'),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')->label('Usuario'),
                Tables\Columns\TextColumn::make('fecha')->label('Fecha'),
                Tables\Columns\TextColumn::make('actividad_fisica')->label('Actividad Física (min)'),
                Tables\Columns\TextColumn::make('horas_suenio')->label('Horas de Sueño'),
                Tables\Columns\TextColumn::make('hidratacion')->label('Hidratación (vasos)'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListHabitos::route('/'),
            'create' => Pages\CreateHabito::route('/create'),
            'edit' => Pages\EditHabito::route('/{record}/edit'),
        ];
    }
}
