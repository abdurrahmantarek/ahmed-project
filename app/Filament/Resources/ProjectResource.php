<?php

namespace App\Filament\Resources;


use Closure;
use Illuminate\Support\HtmlString;
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
                    ])->required()->reactive(),
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('description')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('image')
                    ->label(fn () => new HtmlString('Image direct Link <a href="https://postimages.org/" style="color: orange;" target="_blank">Open Upload Site</a>'))
                    ->required()
                    ->maxLength(255),
                Forms\Components\DatePicker::make('open_date')
                    ->required()->label('تاريخ فتح التقدم'),
                Forms\Components\DatePicker::make('last_date_for_filling_the_form')
                    ->required()->label('تاريخ آخر موعد لاستخراج رقم الإستمارة وسداد جدية الحجز'),
                Forms\Components\DatePicker::make('close_date')
                    ->required()->label('تاريخ بداية حجز الاراضى'),
                Forms\Components\DatePicker::make('open_registration_date')
                    ->required()->label('تاريخ نهاية حجز الاراضى'),
                Forms\Components\TextInput::make('available_lands')
                    ->required()->hidden(function (Closure $get) {
                        return $get('type') != 'lands';
                    })->label('الاراضي المتاحة الآن'),
                Forms\Components\DateTimePicker::make('sorting_date')
                    ->required()->label('الترتيب بالتاريخ')->hint('التاريخ الاقل بيظهر الاول'),
                Forms\Components\Textarea::make('policy')
                    ->required()->label('الشروط والاحكام'),
                Forms\Components\TextInput::make('warning')
                    ->required()->label('تنوية'),
                Forms\Components\TextInput::make('warning_image')
                    ->label(fn () => new HtmlString('Warning Image direct Link <a href="https://postimages.org/" style="color: orange;" target="_blank">Open Upload Site</a>'))
                    ->required()
                    ->maxLength(255),
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
