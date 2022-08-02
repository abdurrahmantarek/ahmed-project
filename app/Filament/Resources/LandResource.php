<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LandResource\Pages;
use App\Filament\Resources\LandResource\RelationManagers;
use App\Models\Land;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LandResource extends Resource
{
    protected static ?string $model = Land::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('project_id')->relationship('project', 'title')
                    ->required(),
                Forms\Components\TextInput::make('gov')
                    ->required()
                    ->label('Government')
                    ->maxLength(255),
                Forms\Components\TextInput::make('city')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('region')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('district')
                    ->maxLength(255),
                Forms\Components\TextInput::make('sub_district')
                    ->maxLength(255),
                Forms\Components\TextInput::make('land')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('area')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('excellence')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('project.title'),
                Tables\Columns\TextColumn::make('gov'),
                Tables\Columns\TextColumn::make('city'),
                Tables\Columns\TextColumn::make('region'),
                Tables\Columns\TextColumn::make('district'),
                Tables\Columns\TextColumn::make('sub_district'),
                Tables\Columns\TextColumn::make('land'),
                Tables\Columns\TextColumn::make('area'),
                Tables\Columns\TextColumn::make('excellence'),
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLands::route('/'),
            'create' => Pages\CreateLand::route('/create'),
            'edit' => Pages\EditLand::route('/{record}/edit'),
        ];
    }
}
