<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EvaluacionResource\Pages;
use App\Filament\Resources\EvaluacionResource\RelationManagers;
use App\Filament\Widgets\RiesgoCardiovascularChart;
use App\Models\Evaluacion;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EvaluacionResource extends Resource
{
    protected static ?string $model = Evaluacion::class;
    protected static ?string $navigationIcon = 'heroicon-o-heart';
    protected static ?string $navigationLabel = 'Evaluaciones';
    protected static ?string $pluralLabel = 'Evaluaciones';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Hidden::make('user_id')
                    ->default(fn() => auth()->id()), // Obtén el ID del usuario autenticado
                Forms\Components\TextInput::make('edad')
                    ->required()
                    ->integer()
                    ->label('Edad'),
                Forms\Components\TextInput::make('peso')
                    ->required()
                    ->numeric()
                    ->label('Peso (kg)'),
                Forms\Components\TextInput::make('altura')
                    ->required()
                    ->numeric()
                    ->label('Altura (cm)'),
                Forms\Components\TextInput::make('sistolica')
                    ->required()
                    ->integer()
                    ->label('Presión Sistólica mm Hg '),
                Forms\Components\TextInput::make('diastolica')
                    ->required()
                    ->integer()
                    ->label('Presión Diastólica mmHg '),
                Forms\Components\TextInput::make('colesterol')
                    ->required()
                    ->numeric()
                    ->label('Colesterolm Total'),
                Forms\Components\Checkbox::make('antecedentes')
                    ->label('Antecedentes Familiares'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')->label('Usuario'),
                Tables\Columns\TextColumn::make('edad')->label('Edad'),
                Tables\Columns\TextColumn::make('peso')->label('Peso (kg)'),
                Tables\Columns\TextColumn::make('altura')->label('Altura (cm)'),
                Tables\Columns\TextColumn::make('sistolica')->label('Sistólica mmHg'),
                Tables\Columns\TextColumn::make('diastolica')->label('Diastólica mmHg '),
                Tables\Columns\TextColumn::make('colesterol')->label('Colesterol total'),
                Tables\Columns\BooleanColumn::make('antecedentes')->label('Antecedentes'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
    public static function getWidgets(): array
    {
        return [
            RiesgoCardiovascularChart::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEvaluacions::route('/'),
            'edit' => Pages\EditEvaluacion::route('/{record}/edit'),
        ];
    }
}
