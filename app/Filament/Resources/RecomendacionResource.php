<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RecomendacionResource\Pages;
use App\Filament\Resources\RecomendacionResource\RelationManagers;
use App\Models\Recomendacion;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RecomendacionResource extends Resource
{
    protected static ?string $model = Recomendacion::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('titulo')
                    ->required()
                    ->label('Título'),
                Forms\Components\Textarea::make('descripcion')
                    ->required()
                    ->label('Descripción'),
                Forms\Components\Select::make('tipo')
                    ->options([
                        'dieta' => 'Dieta',
                        'ejercicio' => 'Ejercicio',
                        'medicamento' => 'Medicamento',
                    ])
                    ->nullable()
                    ->label('Tipo'),
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name')
                    ->required()
                    ->default(auth()->id()) // Asocia automáticamente el usuario autenticado
                    ->label('Usuario'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')->label('Usuario'),
                Tables\Columns\TextColumn::make('titulo')->label('Título'),
                Tables\Columns\TextColumn::make('descripcion')->label('Descripción'),
                Tables\Columns\TextColumn::make('tipo')->label('Tipo'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRecomendacions::route('/'),
            'create' => Pages\CreateRecomendacion::route('/create'),
            'edit' => Pages\EditRecomendacion::route('/{record}/edit'),
        ];
    }
}
