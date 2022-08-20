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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Mockery\Exception;
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
                    FileUpload::make('excel')->disk('local')->visibility('public')->required()
                ])->action(function ($data) {

                    try {

                        $excelData = (new FastExcel)->import(public_path('excels/'. $data['excel']));
                        $this->importLandsFromExcelData($data['project_id'], $excelData);
                    }catch (Exception $exception) {


                    }


                }),
        ];
    }

    public function importLandsFromExcelData($projectId, $excelData)
    {

        $lands = [];

        foreach ($excelData as $k => $land) {


            foreach ($land AS $k => $v) {

                $land[trim($k)] = $v;
            }


            $lands[] = [
                'project_id' => $projectId,
                'gov' => $this->getExcelValue($land['gov']),
                'city' => $this->getExcelValue($land['city']),
                'region' => $this->getExcelValue($land['region']),
                'district' => $this->getExcelValue($land['district']),
                'sub_district' => $this->getExcelValue($land['subdistrict']),
                'land' => $this->getExcelValue($land['land']),
                'area' => $this->getExcelValue($land['area']),
                'excellence' => $this->getExcelValue($land['excellence']),
            ];


        }

        Land::insert($lands);
    }

    public function getExcelValue($excelValue)
    {
        if (empty($excelValue)) {

            return null;
        }

        return $excelValue;
    }
}
