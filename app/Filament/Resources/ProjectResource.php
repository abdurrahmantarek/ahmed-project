<?php

namespace App\Filament\Resources;


use Filament\Forms\Components\TextInput;
use App\Filament\Resources\ProjectResource\Pages;
use App\Filament\Resources\ProjectResource\RelationManagers;
use App\Models\Project;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Collection;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('type')
                    ->options([
                        'lands' => 'اراضي',
                        'apartments' => 'شقق',
                    ])->required(),
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('description')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('image')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DatePicker::make('open_date')
                    ->required(),
                Forms\Components\DatePicker::make('close_date')
                    ->required(),
                TextInput::make('domain')
                    ->url("https://www.google.com")
//                FileUpload::make('landsExcel')->dehydrated(false)

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('type')->enum([
                    'lands' => 'اراضي',
                    'apartments' => 'شقق',
                ]),
                Tables\Columns\TextColumn::make('title'),
                Tables\Columns\TextColumn::make('open_date'),
                Tables\Columns\TextColumn::make('close_date'),
                Tables\Columns\TextColumn::make('description')->limit(30),
//                Tables\Columns\ImageColumn::make('image')->disk('public'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()->action(function (Project $record) {
                    $record->lands()->delete();
                    $record->apartments()->delete();
                    $record->delete();
                }),
            ])
            ->bulkActions([
//                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //RelationManagers\LandsRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'edit' => Pages\EditProject::route('/{record}/edit'),
            'view' => Pages\ViewProject::route('/{record}'),

        ];
    }
}
