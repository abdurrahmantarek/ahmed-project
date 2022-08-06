
@extends('site.layouts.master')

@section('css')

    <style>
        button.nextbtn {
            margin-bottom: 110px;
            margin-top: 20px;
            padding: 6px 25px;
        }
        div.w-100 {
            background-color: rgba(0, 128, 0, 0.2);
            color: green;
            padding: 24px;
            margin-top: 21px;
            border-right: 4px solid rgba(128, 128, 128, 0.3);
            border-radius: 5px;
            margin-bottom: 30px;
        }


    </style>

@endsection
@section('content')
    <div class="wrapper">
        <section class="page-header page-header-xs" id="Reg">
            <div class="container">
                <div class="row">
                    <h1>تمت عملية الحجز</h1>
                    <h1>&nbsp;-&nbsp;
                    <span>{{ session()->get('project')->title }}</span>
                    </h1>
                </div>
            </div>
        </section>
        <div class="container">
            <div class="col-12">
                <div class="w-100">
                    <h3>تمت العمليه بنجاح</h3>
                </div>
            </div>
            <h4 class="text-center">989800505550003916</h4>
            <h4 class="text-center mt-3">برجاء نسخ رقم العمليه لاستخدامه لاحقا في الاستعلام</h4>


            <div class="text-center">
                <a href="{{ route('home') }}" class="btn green pointer nextbtn">الرجوع للصفحه الرئيسيه  </a>
                <button onclick="print()" class="btn green-bg pointer white nextbtn mr-3">اطبع الاستماره</button>
            </div>
        </div>

    </div>

@endsection
