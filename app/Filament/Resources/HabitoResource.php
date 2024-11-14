<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HabitoResource\Pages;
use App\Filament\Resources\HabitoResource\RelationManagers;
use App\Models\Habito;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class HabitoResource extends Resource
{
    protected static ?string $model = Habito::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Hidden::make('user_id')
                    ->default(fn() => auth()->id())
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


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')->label('Usuario'),
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

    public static function getRelations(): array
    {
        return [
            //
        ];
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
