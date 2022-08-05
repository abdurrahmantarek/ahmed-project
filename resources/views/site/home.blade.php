
@extends('site.layouts.master')

@section('content')



    <div>
        <img
            class="img-fluid"
            alt="Responsive image"
            src="{{ asset('assets/img/slider.png') }}"
            alt=""
        />
    </div>
    <section class="page-header page-header-xs">
        <div class="container">
            <h1>المشاريع المتاحة</h1>
        </div>
    </section>

    <section id="projects">
        <div class="container">
            <div class="portfolio-gutter">
                <ul class="nav nav-pills mb-60">
                    <li class="active">
                        <a class="pointer">كل المشاريع</a>
                    </li>
                    <li>
                        <a class="pointer">وحدات سكنية</a>
                    </li>
                    <li>
                        <a class="pointer">أراضي</a>
                    </li>
                </ul>
            </div>


            @foreach($projects AS $project)
                <div id="projectsDiv" class="mix-grid">
                    <div>
                        <br />
                        <div class="row mix mix_all" style="display: block; opacity: 1;">
                            <div class="col-md-7">
                                <img
{{--                                    src="{{ \Storage::url($project->image) }}"--}}
                                    src="{{ $project->image }}"
                                    class="img-fluid w-100"
                                    alt="Responsive image"
                                    style="max-height: 450px"
                                />
                            </div>
                            <div class="col-md-5">
                                <h2 style="margin-bottom: 32px;">
                                    <a class="pointer">{{ $project->title }}</a>
                                </h2>
                                <a class="green pointer">{{ $project->type === 'lands' ? 'اراضي' : 'شقق' }}</a>
                                <div class="mt-30" style="margin-top: 32px;">
                                    <p>
                                        {{ $project->description }}
                                    </p>
                                    @php
                                        \Carbon\Carbon::setLocale('ar');
                                    @endphp
                                    <ul
                                        class="portfolio-detail-list list-unstyled m-0 font-weight-lighter"
                                    >
                                        <li>
                                            <img
                                                class="calender"
                                                src="{{ asset('assets/img/calender.png') }}"
                                                alt=""
                                            />
                                            <span class="lighter">تاريخ فتح باب التقدم:</span>
                                            <span class="lighter">
                                                {{ \Carbon\Carbon::parse($project->open_date)->translatedFormat('d M Y') }}
                                            </span>
                                        </li>
                                        <li>
                                            <img
                                                class="calender"
                                                src="{{ asset('assets/img/calender.png') }}"
                                                alt=""
                                            />
                                            <span class="lighter">تاريخ نهاية الحجز :</span>
                                            <span class="lighter">{{ \Carbon\Carbon::parse($project->close_date)->translatedFormat('d M Y') }}</span>
                                        </li>
                                    </ul>
                                    <br />
                                    <a class="btn btn-teal btn-lg fs-17 pointer" target="_bidReq">
                                        كراسة الشروط</a
                                    >
                                    <a
                                        style="margin-right: 20px;"
                                        href="{{ session()->get('user') ? route('reserve', ['id' => $project->id]) : '#' }}"
                                        class="btn green-bg white btn-lg fs-17 pointer"
                                    >أرغب في التقدم</a
                                    >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br />
                <br />
            @endforeach

        </div>
    </section>
    <br />
    <div class="alert alert-transparent bordered-bottom m-0">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-sm-12">
                    <h3>
                        للمزيد من المعلومات،
                        <a style="color: #0074d9 !important;" class="text-blue pointer"
                        >شاهد الفيديو التوضيحي</a
                        >
                        أو إتصل بنا على
                        <span>
            <b>
              <a class="green">19995</a>
            </b>
          </span>
                        وسوف نقوم بالرد عليكم
                    </h3>
                    <h4>بنك التعمير والإسكان....بنك كبير والأول في التعمير</h4>
                </div>
            </div>
        </div>
    </div>

    <br />

@endsection


@section('css')
    <style>
        section .nav-pills {
            display: inline-block;
        }
        .mb-60 {
            margin-bottom: 60px !important;
        }
        .nav>li {
            position: relative;
        }
        section .nav-pills>li>a {
            padding: 6px 15px;
            margin-bottom: 6px;
        }
        section .nav-pills>li>a, section .nav-pills>li.active>a:hover, section .nav-pills>li.active>a {
            color: #111;
        }
        img.calender {
            width: 4%;
            margin-left: 14px;
        }
        .open > .dropdown-toggle.btn-primary, .show > .btn-primary.dropdown-toggle, .btn-primary, .btn-primary:active, .btn-primary:focus, .btn-primary:hover.pagination > .active > a, .pagination > .active > a:hover {
            border-color: rgb(138, 185, 51);
        }
        h3, .h3 {
            font-size: 1.45rem;
        }
        h4, .h4 {
            font-size: 1.2rem;
        }

    </style>
@endsection
