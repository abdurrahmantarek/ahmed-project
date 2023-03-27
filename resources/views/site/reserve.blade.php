
@extends('site.layouts.master')

@section('content')
    <div class="wrapper">
        <!-- <div class="wrapper"> -->
        <section class="page-header page-header-xs" id="Reg">
            <div class="container">
                <div class="row">
                    <h1>تفاصيل المشروع</h1>
                    <h1>
                        &nbsp;-&nbsp;
                        <span>{{ session()->get('project')->title }}</span>
                    </h1>
                </div>
            </div>
        </section>
        <section class="mb-5" style="padding: 30px">
            <div class="container">
                <div class="row m-0">
                    <div class="col-md-7 col-sm-7">
                        <div class="heading-title heading-border">
                            <h2>
                                <a></a>
                            </h2>
                            <ul class="list-inline categories m-0">

                                <a class="green pointer">{{ $project->type === 'lands' ? 'اراضي' : 'شقق' }}</a>
                            </ul>
                        </div>

                        <p>
                            {{ $project->description }}
                        </p>

                        <br />
                    </div>
                    <div class="col-md-5 col-sm-5 pl-0">

                        @php
                            \Carbon\Carbon::setLocale('ar');
                        @endphp
                        <div class="details">
                            <h2>تفاصيل المشروع</h2>
                            <div class="row">
                                <div class="col-12 d-flex justify-content-between">
                                    <div class="title col-7 d-flex">
                                        <span class="icon">
                                            <img src="{{ asset('assets/img/date.svg') }}" alt="">
                                        </span>
                                        <span>تاريخ فتح التقدم:</span>
                                    </div>
                                    <div class="value col-5">
                                        {{ \Carbon\Carbon::parse($project->open_date)->translatedFormat('d M Y') }}
                                    </div>
                                </div>
                                <div class="col-12 d-flex justify-content-between">
                                    <div class="title col-7 d-flex">
                                        <span class="icon">
                                            <img src="{{ asset('assets/img/date.svg') }}"  alt="">
                                        </span>
                                        <span>تاريخ آخر موعد لاستخراج رقم الإستمارة وسداد جدية الحجز :</span>
                                    </div>
                                    <div class="value col-5">
                                        {{ \Carbon\Carbon::parse($project->last_date_for_filling_the_form)->translatedFormat('d M Y') }}
                                    </div>
                                </div>
                                <div class="col-12 d-flex justify-content-between">
                                    <div class="title col-7 d-flex">
                                        <span class="icon">
                                            <img src="{{ asset('assets/img/date.svg') }}"  alt="">
                                        </span>
                                        <span>تاريخ بداية حجز الاراضى :</span>
                                    </div>
                                    <div class="value col-5">
                                        {{ \Carbon\Carbon::parse($project->close_date)->translatedFormat('d M Y') }}
                                        10:00 ص
                                    </div>
                                </div>
                                <div class="col-12 d-flex justify-content-between">
                                    <div class="title col-7 d-flex">
                                        <span class="icon">
                                            <img src="{{ asset('assets/img/date.svg') }}"  alt="">
                                        </span>
                                        <span>تاريخ نهاية حجز الاراضى :</span>
                                    </div>
                                    <div class="value col-5">
                                        {{ \Carbon\Carbon::parse($project->open_registration_date)->translatedFormat('d M Y') }}
                                    </div>
                                </div>
                                @if(session()->get('project')->type === 'lands')
                                    <div class="col-12 d-flex justify-content-between">
                                        <div class="title col-7 d-flex">
                                            <span class="icon">
                                                <img src="{{ asset('assets/img/hourglass.svg') }}"  alt="">
                                            </span>
                                            <span>الأراضي المتاحة الآن:</span>
                                        </div>
                                        <div class="value col-5">
                                            {{ $project->available_lands }}
                                        </div>
                                    </div>
                                @else
                                    <div class="col-12 d-flex justify-content-between">
                                        <div class="title col-7 d-flex">
                                            <span class="icon">
                                                <img src="{{ asset('assets/img/hourglass.svg') }}"  alt="">
                                            </span>
                                            <span>الوحدات المتاحة الآن:</span>
                                        </div>
                                        <div class="value col-5">
                                            {{ $project->available_lands }}
                                        </div>
                                    </div>
                                @endif


                            </div>
                        </div>
                        <!-- <div *ngIf="(timer | async)?.active" class="reserve-wrapper"> -->

                        @if(\Illuminate\Support\Carbon::parse(\App\Models\Setting::where('key', \App\Models\Setting::BOOKINGS)->first()->start_date)->lessThanOrEqualTo(\Carbon\Carbon::now()))
                        <div class="reserve-wrapper">
                            <a
                                href="{{ route('rules') }}"
                                class="btn green-bg white green-border mr-3"
                            >
                                احجز الآن
                            </a>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="row m-0">
                    <div class="cond w-100">
                        <h3>الشروط والأحكام</h3>

                        @forelse(explode("\n", $project->policy) AS $description)
                            <p>
                                {{ $description }}
                            </p>
                        @empty
                        @endforelse
                    </div>
                    <div class="cond w-100">
                        <h3 style="color: #ff4848">تنويه</h3>
                        <p class="mb-4">
                            {{ $project->warning }}
                        </p>
                    </div>
                    <img src="{{ $project->warning_image }}" class="img-fluid mt-3" alt="" />
                </div>
            </div>
        </section>
    </div>

@endsection


@section('css')

    <style>
        div.heading-title.heading-border {
            padding-right: 15px;
            text-align: right;
            border-left: 0px;
            border-right: 5px solid rgb(204, 204, 204);
            padding-left: 15px;
        }

        div.heading-title {
            position: relative;
        }

        div.heading-title h2 {
            padding-right: 0px !important;
            padding-left: 15px !important;
        }

        p {
            margin-bottom: 30px;
        }

        div.cond h3 {
            border: 1px solid rgb(204, 204, 204);
            margin-top: 30px;
            padding: 13px 20px;
            font-size: 15px;
            color: rgb(51, 51, 51);
            cursor: pointer;
            font-size: 16px;
        }

        div.cond p {
            margin-bottom: 0
        }

        div.loader {
            display: flex;
            height: 65vh;
            justify-content: center;
            align-items: center;
        }

        button.extract {
            background-color: #6c6d70;
            color: #FFF !important;
            margin-left: 3px;
        }

        div.reserve-wrapper {
            background-color: rgba(0, 0, 0, 0.05);
            padding: 6px;
            border: rgba(0, 0, 0, 0.1) 1px solid;
            border-bottom-left-radius: 5px;
            border-bottom-right-radius: 5px;
        }

    </style>
@endsection
