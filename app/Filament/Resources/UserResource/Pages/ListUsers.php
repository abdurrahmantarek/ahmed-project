<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Models\User;
use Filament\Pages\Actions;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use Filament\Pages\Actions\Action;
use Livewire\TemporaryUploadedFile;
use Maatwebsite\Excel\Facades\Excel;
use Rap2hpoutre\FastExcel\FastExcel;
use Illuminate\Support\Facades\Storage;
use App\Filament\Resources\UserResource;
use Filament\Forms\Components\FileUpload;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Facades\Hash;

class ListUsers extends ListRecords
{
    protected static string $resource = UserResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
            Action::make('importUsers')
            ->requiresConfirmation()
            ->form([
                FileUpload::make('excel')->required()
            ])->action(function ($data) {
                $excelData = (new FastExcel)->import(storage_path('app/public/') . $data['excel']);

                $this->importUsersFromExcelData($excelData);

            }),
        ];
    }

    public function importUsersFromExcelData($excelData): void
    {
        foreach ($excelData as $user) {
            User::create([
                'name' => $user['Name'],
                'national_id' => $user['National ID'],
                'password' => $user['Password']
            ]);
        }
    }
}
