
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
            padding-right: 20px;
            border-radius: 0.25rem;
            font-size: 16px;
            background-color: #f7f7f9 !important;
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
        ngb-datepicker {
            width: 235px!important;
        }
        .dropdown-menu, input.form-control.h-40p {
            right: auto!important;
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
                    <span>{{ session()->get('project')->title }}</span>
                    </h1>
                </div>
            </div>
        </section>
        <div class="container">
            <section class="stepA">
                <div class="row m-0">
                    <div class="col-6">
                        <h3 class="font-16">الرقم القومي</h3>
                        <h4 class="cell-detail h-40p">

                            @if(request()->session()->has('logged'))
                                {{ request()->session()->get('user')->national_id }}
                            @endif
                        </h4>
                        <div class="form-group mt-3">
                            <h3 class="font-16">اسم المتقدم طبقا للرقم القومي*</h3>
                            <h4 class="cell-detail h-40p">

                                @if(request()->session()->has('logged'))
                                    {{ request()->session()->get('user')->name }}
                                @endif



                            </h4>
                        </div>

                    </div>
                    <div class="col-6">
                        <h3 class="font-16">تاريخ الميلاد</h3>
                        <h4 class="cell-detail h-40p">

                            @if(request()->session()->has('logged'))

                                @php
                                    $cuted = substr(request()->session()->get('user')->national_id, 1, 6);
                                @endphp

                                {{ preg_replace("/(\d{2})(\d{2})(\d{2})/", '19$1-$2-$3', $cuted) }}
                            @endif

                        </h4>
                        <div class="form-group mt-3">
                            <h3 class="font-16">الرقم المطبوع اسفل الصورة بالرقم القومي</h3>
                            <h4 class="cell-detail h-40p">

                                @if(request()->session()->has('logged'))
{{--                                    {{ request()->session()->get('user')['noPrintedBelowImgInID'] }}--}}
                                @endif

                            </h4>
                        </div>
                    </div>

                </div>
            </section>

            <section class="stepB">
                <h4 class="green-bg white py-3 pl-2">بيانات سداد جدية الحجز و طريقة السداد - البيانات اختياري</h4>
                <form>
                    <div class="row mt-3 mx-0">

                        <div class="col-6">
                            <div class="form-group mt-3">
                                <label for="PaymentMethods">طريقةالسداد</label>
                                <select #PaymentMethods id="PaymentMethods" name="paymentMethodID" class="form-control" >
                                    <option value="0">برجاء الاختيار</option>
                                    <option value="1">تحويل داخلي ACH/Swift</option>
                                    <option value="2">تحويل خارجي</option>
                                    <option value="3">تحويل داخلي من فروع بنك التعمير</option>
                                </select>
                            </div>

                            <div class="form-group mt-3">
                                <label for="paymentNo">رقم مستند السداد </label>
                                <input id="paymentNo" type="text" name="resNum" class="form-control h-40p" placeholder="">
                                <small>  يرجي عدم ادخال رموز ما عدا '/' و '-'</small>
                            </div>

                            <!-- <div class="form-group mt-3">
                              <label for="bankBranchName">الفرع</label>
                              <input #bankBranchName id="bankBranchName" type="text" name="resNum" class="form-control h-40p" placeholder="">
                            </div> -->

                        </div>

                        <div class="col-6">
                            <div class="form-group mt-3">
                                <label for="paymentDate">تاريخ ايصال السداد </label>
                                <input id="paymentDate" value="" class="form-control h-40p" placeholder="" >
                            </div>

                            <div class="form-group mt-3">
                                <!-- <label for="bankName">البنك</label>
                                <select *ngIf="payment === 'intern' || payment === 'extern' || !payment" name="first" class="form-control" id="bankName">
                                  <option value="0">برجاء الاختيار</option>
                                  <option *ngIf="payment !== 'extern'" value="1">بنك مصر</option>
                                  <option *ngIf="payment !== 'extern'" value="2">البنك الأهلى المصرى</option>
                                  <option *ngIf="payment !== 'extern'" value="3">البنك العقارى المصرى العربى</option>
                                  <option *ngIf="payment !== 'extern'" value="4">البنك الزراعى المصرى</option>
                                  <option *ngIf="payment !== 'extern'" value="5">بنك التنمية الصناعية و العمال المصرى</option>
                                  <option *ngIf="payment !== 'extern'" value="6">بنك القاهرة</option>
                                  <option *ngIf="payment !== 'extern'" value="7">المصرف المتحد</option>
                                  <option *ngIf="payment !== 'extern'" value="8">بنك الأسكندرية</option>
                                  <option *ngIf="payment !== 'extern'" value="9">بنك مصر إيران للتنمية</option>
                                  <option *ngIf="payment !== 'extern'" value="10">البنك التجارى الدولى CIB</option>
                                  <option *ngIf="payment !== 'extern'" value="11">التجارى وفا بنك إيجيبت</option>
                                  <option *ngIf="payment !== 'extern'" value="12">بنك الشركة المصرفية العربية الدولية</option>
                                  <option *ngIf="payment !== 'extern'" value="13">بلوم بنك - مصر</option>
                                  <option *ngIf="payment !== 'extern'" value="14">بنك كريدى أجريكول - مصر</option>
                                  <option *ngIf="payment !== 'extern'" value="15">بنك الإمارات دبى الوطنى</option>
                                  <option *ngIf="payment !== 'extern'" value="16">بنك قناة السويس</option>
                                  <option *ngIf="payment !== 'extern'" value="17">بنك قطر الوطنى QNB - مصر</option>
                                  <option *ngIf="payment !== 'extern'" value="18">بنك الإستثمار العربى</option>
                                  <option *ngIf="payment !== 'extern'" value="19">البنك الأهلى الكويتى - مصر</option>
                                  <option *ngIf="payment !== 'extern'" value="20">بنك عودة - مصر</option>
                                  <option *ngIf="payment !== 'extern'" value="21">البنك الأهلى المتحد - مصر</option>
                                  <option *ngIf="payment !== 'extern'" value="22">بنك فيصل الإسلامى - مصر</option>
                                  <option *ngIf="payment !== 'extern'" value="23">بنك التعمير والإسكان</option>
                                  <option *ngIf="payment !== 'extern'" value="24">بنك البركة - مصر</option>
                                  <option *ngIf="payment !== 'extern'" value="25">بنك الكويت الوطنى - مصر</option>
                                  <option *ngIf="payment !== 'extern'" value="26">مصرف أبو ظبى الإسلامى ADIB - مصر</option>
                                  <option *ngIf="payment !== 'extern'" value="27">بنك الإتحاد الوطنى - مصر</option>
                                  <option *ngIf="payment !== 'extern'" value="28">البنك المصرى الخليجى</option>
                                  <option *ngIf="payment !== 'extern'" value="29">البنك العربى الأفريقى الدولى</option>
                                  <option *ngIf="payment !== 'extern'" value="30">بنك أتش أس بى سى مصر</option>
                                  <option *ngIf="payment !== 'extern'" value="32">البنك المصرى لتنمية الصادرات</option>
                                  <option *ngIf="payment !== 'extern'" value="33">المصرف العربى الدولى</option>
                                  <option *ngIf="payment !== 'extern'" value="34">بنك أبوظبى الأول</option>
                                  <option *ngIf="payment !== 'extern'" value="35">سيتى بنك ان ايه - مصر</option>
                                  <option *ngIf="payment !== 'extern'" value="36">البنك العربى ش.م.ع</option>
                                  <option *ngIf="payment !== 'extern'" value="37">بنك المشرق - مصر</option>
                                  <option *ngIf="payment !== 'extern'" value="38">البنك الأهلى اليونانى</option>
                                  <option *ngIf="payment !== 'extern'" value="39">البنك المركزى المصرى</option>
                                  <option *ngIf="payment !== 'extern'" value="40">بنك ناصر الإجتماعى</option>
                                  <option value="41" *ngIf="payment !== 'intern'">بنك خارج مصر</option>
                                </select>
                                <h4 *ngIf="payment === 'hdb'">بنك التعمير و الاسكان</h4> -->
                            </div>

                            <div class="form-group mt-5">
                                <!-- <label for="nIDImg">ارفاق صورة مستند السداد</label>
                                <input type="file" class="form-control-file" id="nIDImg">
                                <p style="font-size: 12px;" class="m-0">يسمح فقط بالملفات من نوع Jpg, Jpeg, pdf بحد اقصي ٣ ميجا بايت</p> -->
                            </div>
                        </div>

                    </div>
                </form>
            </section>

            <section class="stepB">
                <h4 class="green-bg white py-3 pl-2"> بيانات شخصيه</h4>
                <div class="row mt-3 mx-0">
                    <div class="col-6">
                        <h3 class="font-16">بلد الجنسيه </h3>
                        <h4 class="cell-detail h-40p">مصر</h4>

                        <h3 class="font-16 mt-4">رقم التليفون </h3>
                        <h4 class="cell-detail h-40p">
{{--                            {{ request()->session()->get('user')['phoneNo'] }}--}}
                        </h4>

                        <h3 class="font-16 mt-4">محل الاقامه </h3>
                        <h4 class="cell-detail h-40p">مصر</h4>

                        <h3 class="font-16 mt-4">العنوان </h3>
                        <h4 class="cell-detail h-40p" style="line-height: 21px;">
{{--                            {{ request()->session()->get('user')['address'] }}--}}
                        </h4>

                        <h3 class="font-16 mt-4">اسم الزوج/الزوجه طبقا للرقم القومي </h3>
                        <h4 class="cell-detail h-40p">
{{--                            {{ request()->session()->get('user')['partnerName'] }}--}}
                        </h4>

                        <h3 class="font-16 mt-4">صورة الرقم القومي </h3>
                        <h4 class="cell-detail h-40p">file.jpg </h4>
                    </div>
                    <div class="col-6">
                        <h3 class="font-16">رقم المحمول </h3>
                        <h4 class="cell-detail h-40p">
{{--                            {{ request()->session()->get('user')['phoneNo'] }}--}}
                        </h4>

                        <h3 class="font-16 mt-4">عنوان البريد الالكتروني </h3>
                        <h4 class="cell-detail h-40p">
{{--                            {{ request()->session()->get('user')['mail'] }}--}}
                        </h4>

                        <h3 class="font-16 mt-4">المحافظة </h3>
                        <h4 class="cell-detail h-40p">الشرقيه</h4>

                        <h3 class="font-16 mt-4">الحاله الاجتماعيه</h3>
                        <h4 class="cell-detail h-40p">
{{--                            {{ request()->session()->get('user')['socialStuts'] }}--}}
                        </h4>

                        <h3 class="font-16 mt-4">الرقم القومي للزوج / الزوجه </h3>
                        <h4 class="cell-detail h-40p">{{ request()->session()->get('user')['partnerId'] }}</h4>

                        <h3 class="font-16 mt-4">صورة الرقم القومي للزوج / الزوجه</h3>
                        <h4 class="cell-detail h-40p">&nbsp;</h4>
                    </div>

                </div>
            </section>

            <a id="next" href="{{ route('step2') }}" class="btn green-bg white nextbtn">التالي</a>

        </div>

    </div>

    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>

    <script>
        $('#next').on('click', function () {

            localStorage.setItem("paymentNo", $('#paymentNo').val());
            localStorage.setItem("paymentDate", $('#paymentDate').val());
            localStorage.setItem("paymentMethods", $('#PaymentMethods > option:selected').text());

        });
    </script>
@endsection


