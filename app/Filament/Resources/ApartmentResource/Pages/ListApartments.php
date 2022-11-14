<?php

namespace App\Filament\Resources\ApartmentResource\Pages;

use App\Filament\Resources\ApartmentResource;
use App\Models\Apartment;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Pages\Actions;
use Filament\Pages\Actions\Action;
use Filament\Resources\Pages\ListRecords;
use Mockery\Exception;
use Rap2hpoutre\FastExcel\FastExcel;

class ListApartments extends ListRecords
{
    protected static string $resource = ApartmentResource::class;

    protected function getActions(): array
    {
        return [
            Actions\Button::make('Download PDF')
            ->url("/assets/img/slider.png"),
            Actions\CreateAction::make(),
            Action::make('importApartments')
                ->requiresConfirmation()
                ->form([
                    Select::make('project_id')->relationship('project', 'title')->required(),
                    FileUpload::make('excel')->disk('local')->visibility('public')->required()
                ])->action(function ($data) {

                    try {

                        $excelData = (new FastExcel)->import(public_path('excels/'. $data['excel']));
                        $this->importApartmentsFromExcelData($data['project_id'], $excelData);
                    }catch (Exception $exception) {


                    }


                }),
        ];
    }

    public function importApartmentsFromExcelData($projectId, $excelData)
    {
        $apartments = [];

        foreach ($excelData as $k => $apartment) {


            foreach ($apartment AS $k => $v) {

                $apartment[trim($k)] = $v;
            }


            $apartments[] = [
                'project_id' => $projectId,
                'gov' => $this->getExcelValue($apartment['gov']),
                'city' => $this->getExcelValue($apartment['city']),
                'region' => $this->getExcelValue($apartment['region']),
                'district' => $this->getExcelValue($apartment['district']),
                'sub_district' => $this->getExcelValue($apartment['subdistrict']),
                'unit_type' => $this->getExcelValue($apartment['unittype']),
                'building' => $this->getExcelValue($apartment['building']),
                'building_unit' => $this->getExcelValue($apartment['buildingunit']),
                'unit_floor_type' => $this->getExcelValue($apartment['unitfloortype']),
                'floor_num' => $this->getExcelValue($apartment['floornum']),
                'unit_size' => $this->getExcelValue($apartment['unitsize']),
                'unit_model' => $this->getExcelValue($apartment['unitmodel']),
            ];


        }

        Apartment::insert($apartments);
    }

    public function getExcelValue($excelValue)
    {
        if (empty($excelValue)) {

            return null;
        }

        return $excelValue;
    }
}
