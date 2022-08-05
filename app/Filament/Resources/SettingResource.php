<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SettingResource\Pages;
use App\Filament\Resources\SettingResource\RelationManagers;
use App\Models\Setting;
use Closure;
use Filament\Forms;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Artisan;

class SettingResource extends Resource
{
    protected static ?string $model = Setting::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('key')
                    ->required()
                    ->disabled()
                    ->maxLength(255),
                DateTimePicker::make('start_date')->hidden(function (Closure $get) {
                    return $get('key') === Setting::MAINTENANCE_MODE;
                }),
                Toggle::make('value')
                    ->onIcon('heroicon-s-lightning-bolt')
                    ->offIcon('heroicon-s-user')
                    ->inline(false)
                    ->hidden(function (Closure $get) {
                        return $get('key') === Setting::BOOKINGS;
                    })
                    ->afterStateUpdated(function ($state, ?Model $record, Closure $set, Closure $get) {

                        if ($record->key === Setting::MAINTENANCE_MODE) {

                            $status = $state ? 'down' : 'up';

                            Artisan::call($status);

                        }

                        $record->value = $state;
                        $record->save();
                    }),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('key'),
//                Tables\Columns\BooleanColumn::make('value')->action(fn(Setting $record) => self::handleSetting($record))
            ])
            ->filters([
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
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
            'index' => Pages\ListSettings::route('/'),
            'edit' => Pages\EditSetting::route('/{record}/edit'),

        ];
    }

    private static function handleSetting($setting)
    {

        switch ($setting->key) {

            case Setting::BOOKINGS:
                break;
            case Setting::MAINTENANCE_MODE:
                if (!$setting->value) {

                    Artisan::call("down");
                }else {

                    Artisan::call("up");
                }
                break;



        }
        $setting->value = !$setting->value;
        $setting->save();
    }
}
