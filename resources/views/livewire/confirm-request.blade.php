<div>
    <div class="promise" style="width: auto; display: flex; padding: 10px;">
        <input style="width:auto;flex: 0 0 16px;" wire:model="confirmed" type="checkbox" id="customCheck1" [(ngModel)]="checkboxValue" (change)="toggleEditable()">
        <label class="custom-control-label" for="customCheck1">أقر بصحة البيانات و المستندات المقدمه مني و اتحمل كامل المسؤليه المدنيه والجنائيه و في حالة مخالفة هذه البيانات او
            المستندات للحقيقه يعتبر الطلب لاغي ولا يعتد به دون ادني مسؤليه علي الجهة الاداريه او بنك التعميد و الاسكان</label>
    </div>

    <div class="text-center">
        <a href="{{ $confirmed ?  route('step4') : '#' }}"  class="btn green-bg white nextbtn">ارسال الطلب</a>
        <a href="{{ route('step2') }}" style="background-color: #565a5b" class="btn white nextbtn mr-3">رجوع للتعديل</a>
    </div>
</div>
