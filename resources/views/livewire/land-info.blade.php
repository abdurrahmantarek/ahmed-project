<div>

    <section class="stepB">
        <h4 class="green-bg white py-3 pl-2"> بيانات الارض</h4>
        <div class="row mt-3 mx-0">

            <div class="col-12 row">
                <div class="col-6">
                    <div class="form-group mt-3">
                        <label for="governorates">المحافظة *</label>
                        <select wire:model="gov" class="form-control" id="governorates" name="unitGovID" required>
                            <option value="" selected>برجاء الاختيار</option>
                            @foreach($govs AS $gov)
                                <option value="{{ $gov }}">{{ $gov }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-6">

                    <div class="form-group mt-3">
                        <label for="cities">المدينة *</label>
                        <select wire:model="city"  name="unitCityID" class="form-control" id="cities">
                            <option value="" selected>برجاء الاختيار</option>
                            @foreach($cities AS $city)
                                <option value="{{ $city }}">{{ $city }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="col-12 row">
                <div class="col-6">
                    <div class="form-group mt-3">
                        <label for="regions">المنطقة *</label>
                        <select  wire:model="region" name="unitRegionID" class="form-control" id="regions">
                            <option value="" selected>برجاء الاختيار</option>
                            @foreach($regions AS $region)
                                <option value="{{ $region }}">{{ $region }}</option>
                            @endforeach
                        </select>
                    </div>

                </div>
                <div class="col-6">
                    <div class="form-group mt-3">
                        <label for="districts">الحى *</label>
                        <select {{ $disableDistricts ? 'disabled' : '' }}  wire:model="district"  name="unitDistrictID" class="form-control" id="districts">
                            <option value="" selected>برجاء الاختيار</option>
                            @foreach($districts AS $district)
                                <option value="{{ $district }}">{{ $district }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="col-12 row">
                <div class="col-6">

                    <div class="form-group mt-3">
                        <label for="subDistricts">المجاورة *</label>
                        <select {{ $disableSubDistricts ? 'disabled' : '' }}  wire:model="subDistrict" name="unitSubDistrictID" class="form-control" id="subDistricts">
                            <option value="" selected>برجاء الاختيار</option>
                            @foreach($subDistricts AS $subDistrict)
                                <option value="{{ $subDistrict }}">{{ $subDistrict }}</option>
                            @endforeach
                        </select>
                    </div>

                </div>
                <div class="col-6">

                    <div class="form-group mt-3">
                        <label for="landNo">رقم القطعة *</label>
                        <select  wire:model="land" name="landNo" class="form-control" id="landNo">
                            <option value="" selected>برجاء الاختيار</option>
                            @foreach($lands AS $land)
                                <option value="{{ $land }}">{{ $land }}</option>
                            @endforeach
                        </select>
                    </div>

                </div>
            </div>

            @if($area)
            <div class="col-6">



                <div class="result form-group mt-3" >
                    <h3 class="font-16">المساحة</h3>
                    <h4 class="result1 cell-detail h-40p">{{ $area }}</h4>
                </div>



            </div>
            <div class="col-6">









                <div class="result form-group mt-3">
                    <h3 class="font-16">نسبة التميز</h3>
                    <h4 class="result2 cell-detail h-40p">{{ $excellence }}</h4>
                </div>
            </div>
            @endif
        </div>
    </section>

    <div class="text-center">
        <a href="{{ $area ? route('step3') : '#' }}" class="btn green-bg white nextbtn btn-primary" >تاكيد </a>
        <a href="{{ route('step1') }}" class="btn green-bg white nextbtn mr-3">رجوع للتعديل</a>
    </div>

</div>
