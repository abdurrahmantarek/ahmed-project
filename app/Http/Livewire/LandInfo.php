<?php

namespace App\Http\Livewire;

use App\Models\Land;
use App\Models\Project;
use Livewire\Component;

class LandInfo extends Component
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
    public $land = null;
    public $lands = [];
    public $area = null;
    public $excellence = null;
    public bool $disableSubDistricts = false;
    public bool $disableDistricts = false;

    public function mount()
    {
        $this->project = session()->get('project');

        $this->govs = $this->getGovs();
    }
    public function render()
    {
        return view('livewire.land-info');
    }

    private function getGovs()
    {
        return Land::where('project_id', $this->project->id)->distinct()->pluck('gov')->toArray();
    }

    private function getCities()
    {
        return Land::where('project_id', $this->project->id)->distinct()->pluck('city')->toArray();
    }

    public function updatedGov($value)
    {

        //reset other fields 
        $this->region = null;
        $this->regions = [];
        $this->city = null;
        $this->district = null;
        $this->districts = [];
        $this->subDistrict = null;
        $this->subDistricts = [];
        $this->land = null;
        $this->lands = [];
        $this->area = null;
        $this->excellence = null;

        $this->cities = Land::where('project_id', $this->project->id)->where('gov', $value)->distinct()->pluck('city')->toArray();
    }

    public function updatedRegion($value)
    {
        $this->district = null;
        $this->districts = [];
        $this->subDistrict = null;
        $this->subDistricts = [];
        $this->land = null;
        $this->lands = [];
        $this->area = null;
        $this->excellence = null;

        $this->districts = Land::where('project_id', $this->project->id)->where('gov', $this->gov)->where('city', $this->city)->where('region', $value)->distinct()->where('district', '!=', null)->pluck('district')->toArray();

        if (!count($this->districts)) {

            $this->getLands();
            $this->disableDistricts = true;

            if (count($this->getSubDistricts()) == 0) {

                $this->disableSubDistricts = true;
            }else {

                $this->subDistricts = $this->getSubDistricts();
            }
        }
    }

    public function updatedDistrict($value)
    {


        $this->subDistrict = null;
        $this->subDistricts = [];
        $this->land = null;
        $this->lands = [];
        $this->area = null;
        $this->excellence = null;

        $this->subDistricts = Land::where('project_id', $this->project->id)->where('gov', $this->gov)->where('city', $this->city)->where('region', $this->region)->where('district', $value)->distinct()->where('sub_district', '!=', null)->pluck('sub_district')->toArray();

        if (!count($this->subDistricts)) {

            $this->getLands();
            $this->disableSubDistricts = true;
        }else {

            $this->disableSubDistricts = false;

        }
    }

    public function updatedSubDistrict($value)
    {

        $this->land = null;
        $this->area = null;
        $this->excellence = null;

        $this->lands = Land::where('project_id', $this->project->id)->where('gov', $this->gov)->where('city', $this->city)->where('region', $this->region)->where('district', $this->district)->where('sub_district', $value)->distinct()->where('land', '!=', null)->pluck('land')->toArray();
    }

    public function updatedLand($value)
    {
        $land = Land::where('project_id', $this->project->id)->where('gov', $this->gov)->where('city', $this->city)->where('region', $this->region)->where('district', $this->district)->where('sub_district', $this->subDistrict)->where('land', $value)->first();

        $this->area = $land->area;
        $this->excellence = $land->excellence;

        session()->put('land', $land);

    }

    public function updatedCity($value)
    {

        $this->region = null;
        $this->district = null;
        $this->districts = [];
        $this->subDistrict = null;
        $this->subDistricts = [];
        $this->land = null;
        $this->lands = [];
        $this->area = null;
        $this->excellence = null;

        $this->regions = Land::where('project_id', $this->project->id)->where('gov', $this->gov)->where('city', $value)->distinct()->where('region', '!=', null)->pluck('region')->toArray();

    }

    private function getLands()
    {
        $this->lands = Land::where('project_id', $this->project->id)->where('gov', $this->gov)->where('city', $this->city)->where('region', $this->region)->where('district', $this->district)->where('sub_district', $this->subDistrict)->distinct()->where('land', '!=', null)->pluck('land')->toArray();

    }

    private function getSubDistricts()
    {
        return Land::where('project_id', $this->project->id)->where('gov', $this->gov)->where('city', $this->city)->where('region', $this->region)->distinct()->where('sub_district', '!=', null)->pluck('sub_district')->toArray();
    }
}
