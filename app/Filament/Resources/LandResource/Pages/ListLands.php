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

        foreach ($excelData as $k => $land) {


            foreach ($land AS $k => $v) {

                $land[trim($k)] = $v;
            }

            Land::create([
                'project_id' => $projectId,
                'gov' => $this->getExcelValue($land['gov']),
                'city' => $this->getExcelValue($land['city']),
                'region' => $this->getExcelValue($land['region']),
                'district' => $this->getExcelValue($land['district']),
                'sub_district' => $this->getExcelValue($land['subdistrict']),
                'land' => $this->getExcelValue($land['land']),
                'area' => $this->getExcelValue($land['area']),
                'excellence' => $this->getExcelValue($land['excellence']),
            ]);
        }
    }

    public function getExcelValue($excelValue)
    {
        if ($excelValue == '-' || empty($excelValue)) {

            return null;
        }

        return $excelValue;
    }
}
