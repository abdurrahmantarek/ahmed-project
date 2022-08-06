<?php

namespace App\Http\Livewire;

use App\Models\Apartment;
use Livewire\Component;

class ApartmentInfo extends Component
{
    public $project = null;
    public $city = null;
    public $cities = [];
    public $govs = [];
    public $gov;
    public $regions = [];
    public $region = null;
    public $district = null;
    public $districts = [];
    public $subDistrict = null;
    public $subDistricts = [];
    public $unitType = null;
    public $unitTypes = [];
    public $building = null;
    public $buildings = [];
    public $buildingUnits = [];
    public $buildingUnit = null;

    public $floorType = null;
    public $floorNum = null;
    public $unitSize = null;
    public $unitModel = null;


    public $disableDistrict = false;
    public $disableSubDistrict = false;
    public $disableUnitType = false;
    public $disableBuilding = false;
    public $disableBuildingUnit = false;



    public function mount()
    {
        $this->project = session()->get('project');

        $this->govs = $this->getGovs();
    }

    private function getGovs()
    {
        return Apartment::where('project_id', $this->project->id)->distinct()->pluck('gov')->toArray();
    }

    private function getCities()
    {
        return Apartment::where('project_id', $this->project->id)->distinct()->pluck('city')->toArray();
    }

    public function updatedGov($value)
    {
        $this->cities = Apartment::where('project_id', $this->project->id)->where('gov', $value)->distinct()->pluck('city')->toArray();
    }

    public function updatedRegion($value)
    {
        $this->districts = Apartment::where('project_id', $this->project->id)->where('gov', $this->gov)->where('city', $this->city)->where('region', $value)->distinct()->where('district', '!=', null)->pluck('district')->toArray();

        if (!count($this->districts)) {

            $this->disableDistrict = true;

            if (count($this->getSubDistricts()) == 0) {

                $this->disableSubDistrict = true;
            }
        }
    }

    public function updatedDistrict($value)
    {
        $this->subDistricts = Apartment::where('project_id', $this->project->id)->where('gov', $this->gov)->where('city', $this->city)->where('region', $this->region)->where('district', $value)->distinct()->where('sub_district', '!=', null)->pluck('sub_district')->toArray();

        $this->getUnitTypes();
        if (!count($this->subDistricts)) {

            $this->disableSubDistrict = true;
        }
    }

    public function updatedSubDistrict($value)
    {
        $this->unitTypes = Apartment::where('project_id', $this->project->id)->where('gov', $this->gov)->where('city', $this->city)->where('region', $this->region)->where('district', $this->district)->where('sub_district', $value)->distinct()->where('unit_type', '!=', null)->pluck('unit_type')->toArray();
    }



    public function updatedCity($value)
    {
        $this->regions = Apartment::where('project_id', $this->project->id)->where('gov', $this->gov)->where('city', $value)->distinct()->where('region', '!=', null)->pluck('region')->toArray();

    }

    private function getSubDistricts()
    {
        return Apartment::where('project_id', $this->project->id)->where('gov', $this->gov)->where('city', $this->city)->where('region', $this->region)->distinct()->where('sub_district', '!=', null)->pluck('sub_district')->toArray();
    }

    public function render()
    {
        return view('livewire.apartment-info');
    }

    public function getUnitTypes()
    {
        $this->unitTypes = Apartment::where('project_id', $this->project->id)->where('gov', $this->gov)->where('city', $this->city)->where('region', $this->region)->where('district', $this->district)->where('sub_district', $this->subDistrict)->distinct()->where('unit_type', '!=', null)->pluck('unit_type')->toArray();

        if (count($this->unitTypes) === 0) {

            $this->getBuildings();

            $this->disableUnitType = false;
        }
    }

    private function getBuildings()
    {

        $this->buildings = Apartment::where('project_id', $this->project->id)
            ->where('gov', $this->gov)
            ->where('city', $this->city)
            ->where('region', $this->region)
            ->where('district', $this->district)
            ->where('sub_district', $this->subDistrict)
            ->where('unit_type', $this->unitType)
            ->distinct()->where('building', '!=', null)->pluck('building')->toArray();

        if (count($this->buildings) === 0) {

            $this->getBuildingUnits();

            $this->disableBuilding = false;

        }
    }

    private function getBuildingUnits()
    {
        $this->buildingUnits = Apartment::where('project_id', $this->project->id)
            ->where('gov', $this->gov)
            ->where('city', $this->city)
            ->where('region', $this->region)
            ->where('district', $this->district)
            ->where('sub_district', $this->subDistrict)
            ->where('unit_type', $this->unitType)
            ->where('building', $this->building)
            ->distinct()->where('building_unit', '!=', null)->pluck('building_unit')->toArray();

        if (count($this->buildingUnits) === 0) {

            $this->disableBuildingUnit = false;
        }

    }

    public function updatedUnitType($value)
    {
        $this->buildings = Apartment::where('project_id', $this->project->id)
            ->where('gov', $this->gov)
            ->where('city', $this->city)
            ->where('region', $this->region)
            ->where('district', $this->district)
            ->where('sub_district', $this->subDistrict)
            ->where('unit_type', $value)
            ->distinct()->where('building', '!=', null)->pluck('building')->toArray();
    }

    public function updatedBuilding($value)
    {
        $this->buildingUnits = Apartment::where('project_id', $this->project->id)
            ->where('gov', $this->gov)
            ->where('city', $this->city)
            ->where('region', $this->region)
            ->where('district', $this->district)
            ->where('sub_district', $this->subDistrict)
            ->where('unit_type', $this->unitType)
            ->where('building', $value)
            ->distinct()->where('building_unit', '!=', null)->pluck('building_unit')->toArray();

    }

    public function updatedBuildingUnit($value)
    {
        $this->getResults();
    }

    private function getResults()
    {

        $record = Apartment::where('project_id', $this->project->id)
            ->where('gov', $this->gov)
            ->where('city', $this->city)
            ->where('region', $this->region)
            ->where('district', $this->district)
            ->where('sub_district', $this->subDistrict)
            ->where('unit_type', $this->unitType)
            ->where('building', $this->building)
            ->where('building_unit', $this->buildingUnit)
            ->first();

        $this->floorType = $record->unit_floor_type;
        $this->floorNum = $record->floor_num;
        $this->unitSize = $record->unit_size;
        $this->unitModel = $record->unit_model;

        session()->put('land', $record);

    }

}
