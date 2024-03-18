@extends('admin.layouts.master')
@section('title')
    بيانات الموقع
@endsection
@section('content')
    <div class="content">
        <div class="col-sm-12 page-heading">
            <div class="col-sm-6">
                <h2>بيانات الموقع</h2>
            </div><!--End col-md-6-->
            <div class="col-sm-6">
                <ul class="breadcrumb">
                    <li><a href="{{route('admin.dashboard')}}">الرئيسيه</a></li>
                    <li class="active">بيانات الموقع</li>
                </ul>
            </div><!--End col-md-6-->
        </div>
        <div class="spacer-15"></div>
        <div class="widget">
            <form class="widget-content ajax-form" action="{{route('admin.settings')}}" method="post" enctype="multipart/form-data">
                {!! csrf_field() !!}
                <div class="col-sm-6 form-group">
                    <label>اسم الموقع</label>
                    <input class="form-control" type="text" value="{{$settings->name}}" name="name">
                </div>

                <div class="col-sm-6 form-group">
                    <label>رقم الهاتف</label>
                    <input class="form-control" type="text" value="{{$settings->phone}}" name="phone">
                </div>
                <div class="col-sm-6 form-group">
                    <label>البريد الالكتروني</label>
                    <input class="form-control" type="email" value="{{$settings->email}}" name="email">
                </div>
                <div class="col-sm-6 form-group">
                    <label>العنوان باللغه العربيه</label>
                    <input type="text" class="form-control" name="address_ar" value="{{$settings->address_ar}}">
                </div>
                <div class="col-sm-6 form-group">
                    <label>العنوان باللغه الانجليزيه</label>
                    <input type="text" class="form-control" name="address_en" value="{{$settings->address_en}}">
                </div>
                <div class="spacer-15"></div>
                <hr>
                <div class="col-sm-6 form-group">
                    <label>وصف مختصر باللغه العربيه</label>
                    <textarea class="form-control" name="brief_ar">{{$settings->brief_ar}}</textarea>
                </div>
                <div class="col-sm-6 form-group">
                    <label>وصف مختصر باللغه الانجليزيه</label>
                    <textarea class="form-control" name="brief_en">{{$settings->brief_en}}</textarea>
                </div>
                <div class="spacer-15"></div>
                <hr>
                <div class="col-sm-6 form-group">
                    <label>لينك موقع الفيسبوك</label>
                    <input type="text" class="form-control" name="facebook" value="{{$settings->facebook}}">
                </div>
                <div class="col-sm-6 form-group">
                    <label>لينك موقع تويتر</label>
                    <input type="text" class="form-control" name="twitter" value="{{$settings->twitter}}">
                </div>
                <div class="col-sm-6 form-group">
                    <label>لينك موقع انستاجرام</label>
                    <input type="text" class="form-control" name="instagram" value="{{$settings->instagram}}">
                </div>
                <div class="col-sm-6 form-group">
                    <label>لينك موقع يوتيوب</label>
                    <input type="text" class="form-control" name="youtube" value="{{$settings->youtube}}">
                </div>
                <div class="spacer-15"></div>
                <hr>
                <div class="col-sm-6 form-group">
                    <label>اسم البنك</label>
                    <input class="form-control" type="text" value="{{$settings->bank_name}}" name="bank_name">
                </div>
                <div class="col-sm-6 form-group">
                    <label>اسم المستخدم بالبنك</label>
                    <input class="form-control" type="email" value="{{$settings->username}}" name="username">
                </div>
                <div class="col-sm-6 form-group">
                    <label>رقم الحساب</label>
                    <input type="text" class="form-control" name="account_number" value="{{$settings->account_number}}">
                </div>
                <div class="col-sm-6 form-group">
                    <label>Iban</label>
                    <input type="text" class="form-control" name="iban" value="{{$settings->iban}}">
                </div>
                
                <div class="spacer-15"></div>

                <div class="col-sm-12 save-btn">
                    <button class="custom-btn green-bc" type="submit">حفظ</button>
                </div>
                <div class="progress-wrap" style="display: none;">
                    <div class="progress">
                        <div class="bar"></div >
                        <div class="percent">0%</div >
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection