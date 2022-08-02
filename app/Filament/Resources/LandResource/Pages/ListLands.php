<?php

namespace App\Filament\Resources\LandResource\Pages;

use App\Filament\Resources\LandResource;
use App\Models\Land;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Pages\Actions;
use Filament\Pages\Actions\Action;
use Filament\Resources\Pages\ListRecords;
use Rap2hpoutre\FastExcel\FastExcel;

class ListLands extends ListRecords
{
    protected static string $resource = LandResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
            Action::make('importLands')
                ->requiresConfirmation()
                ->form([
                    Select::make('project_id')->relationship('project', 'title')->required(),
                    FileUpload::make('excel')->required()
                ])->action(function ($data) {
                    $excelData = (new FastExcel)->import(storage_path('app/public/') . $data['excel']);

                    $this->importLandsFromExcelData($data['project_id'], $excelData);

                }),
        ];
    }

    public function importLandsFromExcelData($projectId, $excelData)
    {
        foreach ($excelData as $land) {
            Land::create([
                'project_id' => $projectId,
                'gov' => $land['gov'],
                'city' => $land['city'],
                'region' => $land['region'],
                'district' => $land['district'],
                'sub_district' => $land['subdistrict'],
                'land' => $land['land'],
                'area' => $land['area'],
                'excellence' => $land['excellence'],
            ]);
        }
    }
}
