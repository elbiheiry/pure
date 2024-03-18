@extends('admin.layouts.master')
@section('title')
    الرئيسيه
@endsection
@section('content')
    <div class="content">
        <div class="col-sm-12">
            <div class="widget">
                <div class="widget-content">
                    <div class="col-sm-12">
                        <img src="{{asset('assets/admin/images/logo.png')}}" class="intro-logo">
                    </div>
                    <div class="funfact-lists">

                        <div class="col-sm-4">
                            <div class="counter">
                                <h3 class="timer" data-to="{{\App\Member::count()}}" data-speed="2000">{{\App\Member::count()}}</h3>
                                <div class="count-name">الاعضاء</div>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="counter">
                                <h3 class="timer" data-to="{{\App\Company::count()}}" data-speed="2000">{{\App\Company::count()}}</h3>
                                <div class="count-name">الشركات</div>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="counter">
                                <h3 class="timer" data-to="{{\App\Package::count()}}" data-speed="2000">{{\App\Package::count()}}</h3>
                                <div class="count-name">الباقات</div>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="counter">
                                <h3 class="timer" data-to="{{\App\Car::count()}}" data-speed="2000">{{\App\Car::count()}}</h3>
                                <div class="count-name">السيارات</div>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="counter">
                                <h3 class="timer" data-to="{{\App\Wash::whereDate('date' , \Carbon\Carbon::today()->format('Y-m-d'))->count()}}" data-speed="2000">{{\App\Wash::whereDate('date' , \Carbon\Carbon::today()->format('Y-m-d'))->count()}}</h3>
                                <div class="count-name">عدد الغسلات اليوم</div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="counter">
                                <h3 class="timer" data-to="{{\App\Notification::whereDate('created_at' , \Carbon\Carbon::today())->count()}}" data-speed="2000">{{\App\Notification::whereDate('created_at' , \Carbon\Carbon::today())->count()}}</h3>
                                <div class="count-name">عدد الاشعارات اليوم</div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="widget">
                <form class="widget-content ajax-form" action="{{route('admin.dashboard')}}" method="post" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    
                    <div class="col-sm-6 form-group">
                        <label>العنوان باللغه العربيه</label>
                        <input type="text" class="form-control" name="title_ar" value="{{$home->arabic()->title}}">
                    </div>
                    <div class="col-sm-6 form-group">
                        <label>العنوان باللغه الانجليزيه</label>
                        <input type="text" class="form-control" name="title_en" value="{{$home->english()->title}}">
                    </div>
                    <hr>
                    <div class="col-sm-6 form-group">
                        <label>وصف مختصر باللغه العربيه</label>
                        <textarea class="form-control" name="description_ar">{{$home->arabic()->description}}</textarea>
                    </div>
                    <div class="col-sm-6 form-group">
                        <label>وصف مختصر باللغه الانجليزيه</label>
                        <textarea class="form-control" name="description_en">{{$home->english()->description}}</textarea>
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
    </div>
@endsection