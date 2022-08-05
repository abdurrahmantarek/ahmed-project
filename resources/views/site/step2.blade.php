
@extends('site.layouts.master')


@section('css')
    <style>
        section.stepA {
            border: 1px solid rgb(204, 204, 204);
            border-radius: 6px;
            padding: 20px 0;
            margin-top: 40px;
        }
        section.stepB {
            border: 1px solid rgb(204, 204, 204);
            border-radius: 6px;
            padding: 20px 0;
            margin-top: 40px;
            padding-top: 0;
        }
        .cell-detail {
            line-height: 40px;
            padding-right: 0px;
            border-radius: 0.25rem;
            font-size: 16px;
            background-color: rgba(0, 0, 0, 0.0) !important;
        }
        a.nextbtn {
            margin-bottom: 110px;
            margin-top: 20px;
            padding: 6px 25px;
        }
        a:disabled,
        a[disabled]{
            border: 1px solid #cccccc;
            background-color: #cccccc!important;
            color: #666666!important;
        }

    </style>
@endsection
@section('content')
    <div class="wrapper">
        <section class="page-header page-header-xs" id="Reg">
            <div class="container">
                <div class="row">
                    <h1>استمارة حجز ارض</h1>
                    <h1>&nbsp;-&nbsp;
                        <span></span>
                    </h1>
                </div>
            </div>
        </section>
        <div class="container">

            @livewire('land-info')

            <div class="text-center">
                <a href="{{ route('step3') }}" class="btn green-bg white nextbtn" >تاكيد </a>
                <a href="{{ route('step1') }}" class="btn green-bg white nextbtn mr-3">رجوع للتعديل</a>
            </div>
        </div>

    </div>

{{--    <script src="{{ asset('assets/js/data.js') }}"></script>--}}
{{--    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>--}}
<script>

    // $('.result').hide();


</script>
@endsection
