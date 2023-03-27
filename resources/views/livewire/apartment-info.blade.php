<div>

    <section class="stepB">
        <h4 class="green-bg white py-3 pl-2"> بيانات الوحدة</h4>
        <div class="row mt-3 mx-0">

            <div class="col-12 row">
                <div class="col-6">
                    <div class="form-group mt-3">
                        <label for="governorates">المحافظة *</label>
                        <select wire:model="gov" class="form-control" id="governorates" name="unitGovID">
                            <option value="" selected>برجاء الإختيار</option>
                            @foreach($govs AS $gov)
                                <option value="{{ $gov }}">{{ $gov }}</option>
                            @endforeach
                        </select>
                        <div style="color: red; --darkreader-inline-color:#ff1a1a;display:none;" data-darkreader-inline-color="">برجاء اختيار المحافظة</div>
                    </div>
                </div>
                <div class="col-6">

                    <div class="form-group mt-3">
                        <label for="cities">المدينة *</label>
                        <select wire:model="city"  name="unitCityID" class="form-control" id="cities">
                            <option value="" selected>برجاء الإختيار</option>
                            @foreach($cities AS $city)
                                <option value="{{ $city }}">{{ $city }}</option>
                            @endforeach
                        </select>
                        <div style="color: red; --darkreader-inline-color:#ff1a1a;display:none;" data-darkreader-inline-color="">برجاء اختيار المدينة</div>
                    </div>
                </div>
            </div>

            <div class="col-12 row">
                <div class="col-6">
                    <div class="form-group mt-3">
                        <label for="regions">المنطقة *</label>
                        <select  wire:model="region" name="unitRegionID" class="form-control" id="regions">
                            <option value="" selected>برجاء الإختيار</option>
                            @foreach($regions AS $region)
                                <option value="{{ $region }}">{{ $region }}</option>
                            @endforeach
                        </select>
                        <div style="color: red; --darkreader-inline-color:#ff1a1a;display:none;" data-darkreader-inline-color="">برجاء اختيار المنطقة</div>
                    </div>

                </div>
                <div class="col-6">
                    <div class="form-group mt-3">
                        <label for="districts">الحى *</label>
                        <select {{ $disableDistricts ? 'disabled' : '' }}  wire:model="district"  name="unitDistrictID" class="form-control" id="districts">
                            <option value="" selected>برجاء الإختيار</option>
                            @foreach($districts AS $district)
                                <option value="{{ $district }}">{{ $district }}</option>
                            @endforeach
                        </select>
                        <div style="color: red; --darkreader-inline-color:#ff1a1a;display:none;" data-darkreader-inline-color="">برجاء اختيار الحي</div>
                    </div>
                </div>
            </div>

            <div class="col-12 row">
                <div class="col-6">

                    <div class="form-group mt-3">
                        <label for="subDistricts">المجاورة *</label>
                        <select {{ $disableSubDistricts ? 'disabled' : '' }}  wire:model="subDistrict" name="unitSubDistrictID" class="form-control" id="subDistricts">
                            <option value="" selected>برجاء الإختيار</option>
                            @foreach($subDistricts AS $subDistrict)
                                <option value="{{ $subDistrict }}">{{ $subDistrict }}</option>
                            @endforeach
                        </select>
                        <div style="color: red; --darkreader-inline-color:#ff1a1a;display:none;" data-darkreader-inline-color="">برجاء اختيار المجاورة</div>
                    </div>

                </div>
                <div class="col-6">

                    <div class="form-group mt-3">
                        <label>نوع الوحدة <span style="color :red"></span></label>
                        <select {{ $disableUnitType ? 'disabled' : '' }} wire:model="unitType" id="unitTypes" class="form-control pointer required" name="unitTypeID">
                            <option value="" selected>برجاء الإختيار</option>
                            @foreach($unitTypes AS $unitType)
                                <option value="{{ $unitType }}">{{ $unitType }}</option>
                            @endforeach
                        </select>
                        <div style="color: red; --darkreader-inline-color:#ff1a1a;display:none;" data-darkreader-inline-color="">برجاء اختيار نوع الوحدة</div>
                    </div>

                </div>
            </div>

            <div class="row col-12">

                <div class="col-6">

                    <div class="form-group mt-3">
                        <label>رقم العمارة<span style="color :red"></span></label>
                        <select {{ $disableBuilding ? 'disabled' : '' }} wire:model="building" id="buildings" class="form-control pointer required" name="buildingID">
                            <option value="" selected>برجاء الإختيار</option>
                            @foreach($buildings AS $building)
                                <option value="{{ $building }}">{{ $building }}</option>
                            @endforeach
                        </select>
                        <div style="color: red; --darkreader-inline-color:#ff1a1a;display:none;" data-darkreader-inline-color="">برجاء اختيار رقم العمارة</div>
                    </div>

                </div>

                <div class="col-6">

                    <div class="form-group mt-3">
                        <label>رقم الوحدة السكنية<span style="color :red"></span></label>
                        <select {{ $disableBuildingUnit ? 'disabled' : '' }} wire:model="buildingUnit" id="buildingUnits" class="form-control pointer required" name="buildingUnitID">
                            <option value="" selected>برجاء الإختيار</option>
                            @foreach($buildingUnits AS $buildingUnit)
                                <option value="{{ $buildingUnit }}">{{ $buildingUnit }}</option>
                            @endforeach
                        </select>
                        <div style="color: red; --darkreader-inline-color:#ff1a1a;display:none;" data-darkreader-inline-color="">برجاء اختيار رقم الوحدة السكنية</div>
                    </div>

                </div>

            </div>

            <div class="row col-12">

                <div class="col-6">

                    <div class="form-group mt-3">
                        <label>نوع الدور <span style="color :red"></span></label>
                        <select disabled wire:model="floorType" id="floorTypeID" class="form-control pointer required" name="unitFloorTypeID">
                            <option value="{{ $floorType }}">{{ $floorType }}</option>
                        </select>
                    </div>

                </div>

                <div class="col-6">

                    <div class="form-group mt-3">
                        <label>رقم الدور <span style="color :red"></span></label>
                        <select disabled wire:model="floorNum" id="floorNumID" class="form-control pointer required" name="unitFloorNumber">
                            <option value="{{ $floorNum }}">{{ $floorNum }}</option>
                        </select>
                    </div>

                </div>

            </div>


            <div class="row col-12">

                <div class="col-6">

                    <div class="form-group mt-3">
                        <label>مساحة الوحدة <span style="color :red"></span></label>
                        <select disabled wire:model="unitSize" id="unitSizeID" class="form-control pointer required" name="unitSize">
                            <option value="{{ $unitSize }}">{{ $unitSize }}</option>
                        </select>
                    </div>

                </div>

                <div class="col-6">

                    <div class="form-group mt-3">
                        <label>نموذج الوحدة <span style="color :red">*</span></label>
                        <select disabled wire:model="unitModel" id="unitModelID" disabled class="form-control pointer required" name="unitModel">
                            <option value="{{ $unitModel }}">{{ $unitModel }}</option>
                        </select>
                    </div>

                </div>

            </div>


        </div>
    </section>

    <div class="text-center">

    <button onclick="checkSelect()" style="margin-bottom: 110px;margin-top: 20px;cursor: pointer;padding: 6px 25px;" class="btn green-bg white nextbtn btn-primary">تاكيد</button>
        <!-- <a href="{{ $floorType ? route('step3') : 'JavaScript:void(0);' }}" class="btn green-bg white nextbtn" >تاكيد </a> -->
        <a href="{{ route('step1') }}" class="btn green-bg white nextbtn mr-3">رجوع للتعديل</a>
    </div>
</div>

<script>
    function checkSelect() {

        let selectIdAr = ["governorates","cities","regions","districts","subDistricts","unitTypes","buildings","buildingUnits"]
        for (let i = 0; i < selectIdAr.length; i++) {
            let selectElement = document.getElementById(selectIdAr[i]);
            let selectedValue = selectElement.options[0].selected;
            if (selectedValue) {
                selectElement.nextElementSibling.style.color = "red";
                selectElement.nextElementSibling.style.display = "block";
            } else {
                selectElement.nextElementSibling.style.color = "red";
                selectElement.nextElementSibling.style.display = "none";
            }
        }
        let LastSelect = document.getElementById("buildingUnits");
        let selectedValue = LastSelect.options[0].selected;
        if(!selectedValue){
            window.location.href = "{{ route('step3') }}"
        }
    }
</script>
