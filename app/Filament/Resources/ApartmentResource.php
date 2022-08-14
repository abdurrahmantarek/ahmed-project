<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ApartmentResource\Pages;
use App\Filament\Resources\ApartmentResource\RelationManagers;
use App\Models\Apartment;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ApartmentResource extends Resource
{
    protected static ?string $model = Apartment::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('project_id')->relationship('project', 'title')
                    ->required(),
                Forms\Components\TextInput::make('gov')
                    ->required()
                    ->maxLength(191),
                Forms\Components\TextInput::make('city')
                    ->required()
                    ->maxLength(191),
                Forms\Components\TextInput::make('region')
                    ->required()
                    ->maxLength(191),
                Forms\Components\TextInput::make('district')
                    ->maxLength(191),
                Forms\Components\TextInput::make('sub_district')
                    ->maxLength(191),
                Forms\Components\TextInput::make('unit_type')
                    ->maxLength(191),
                Forms\Components\TextInput::make('building')
                    ->maxLength(191),
                Forms\Components\TextInput::make('building_unit')
                    ->maxLength(191),
                Forms\Components\TextInput::make('unit_floor_type')
                    ->maxLength(191),
                Forms\Components\TextInput::make('floor_num')
                    ->maxLength(191),
                Forms\Components\TextInput::make('unit_size')
                    ->maxLength(191),
                Forms\Components\TextInput::make('unit_model')
                    ->maxLength(191),
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
                Tables\Columns\TextColumn::make('unit_type'),
                Tables\Columns\TextColumn::make('building'),
                Tables\Columns\TextColumn::make('building_unit'),
                Tables\Columns\TextColumn::make('unit_floor_type'),
                Tables\Columns\TextColumn::make('floor_num'),
                Tables\Columns\TextColumn::make('unit_size'),
                Tables\Columns\TextColumn::make('unit_model'),
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
            'index' => Pages\ListApartments::route('/'),
            'create' => Pages\CreateApartment::route('/create'),
            'edit' => Pages\EditApartment::route('/{record}/edit'),
        ];
    }
}
