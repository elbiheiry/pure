@extends('site.layouts.master')
@section('title')
    تعديل الحساب
@endsection
@section('content')
    <div class="page-head">
        <div class="page-head-img">
            <img src="{{asset('assets/site/images/contact-header-bg.jpg')}}">
        </div><!--End page-head-img-->

        <div class="page-title-wrap">
            <h3 class="page-title">
                تعديل الحساب

            </h3>
        </div><!--End page-title-wrap-->
    </div><!--End page-head-->

    <div class="page-content">
        <section class="section-md colored">
            <div class="container">
                <div class="item-box">
                    <div class="public-profile">
                        <div class="account-img">
                            <img src="{{asset('storage/uploads/companies/'.$company->logo)}}">
                        </div><!--End account-img-->
                        <h3 class="public-profile-name">
                            {{auth()->guard('site')->user()->first_name}}
                        </h3><!--End public-profile-name-->
                    </div><!--End public-profile-->
                    <ul class="profile-list">
                        <li class="active">
                            <a href="{{route('site.profile')}}">
                                تعديل الحساب
                            </a>
                        </li>
                        <li>
                            <a href="{{route('site.orders')}}">
                                الطلبيات
                            </a>
                        </li>
                        <li>
                            <a href="{{route('site.packages')}}">
                                الباقات
                            </a>
                        </li>
                        <li>
                            <a href="{{route('site.subscribtions')}}">
                                اشتراكى
                            </a>
                        </li>
                        <li>
                            <a href="{{route('site.logout')}}">
                                تسجيل الخروج
                            </a>
                        </li>
                    </ul><!--End nav-tabs-->
                </div><!--End item-box-->
                <div class="item-box my-beckages">
                    <div class="row justify-content-center">
                        <div class="col-md-9">
                            <div class="login-register-box">
                                <form class="form profile-form" action="{{route('site.profile.edit')}}" method="post">
                                    {!! csrf_field() !!}
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class=" form-group input-icon">
                                                <i class="fas fa-mobile-alt"></i>
                                                <input class="form-control" placeholder="رقم الجوال" name="phone"
                                                       type="text" value="{{$member->phone}}">
                                            </div>
                                        </div><!--End col-->
                                        <div class="col-md-6">
                                            <div class=" form-group input-icon">
                                                <i class="far fa-user"></i>
                                                <input class="form-control" placeholder="الاسم الاول" name="first_name"
                                                       type="text" value="{{$member->first_name}}">
                                            </div>
                                        </div><!--End col-->
                                        <div class="col-md-6">
                                            <div class=" form-group input-icon">
                                                <i class="far fa-user"></i>
                                                <input class="form-control" placeholder="الاسم الاخير" name="last_name"
                                                       type="text" value="{{$member->last_name}}">
                                            </div>
                                        </div><!--End col-->
                                        <div class="col-sm-6">
                                            <div class=" form-group input-icon">
                                                <i class="far fa-envelope"></i>
                                                <input class="form-control" placeholder="رقم اللوحة" type="text"
                                                       name="plate_number" value="{{$member->plate_number}}">
                                            </div>
                                        </div><!--End col-->
                                        <div class="col-sm-6">
                                            <div class=" form-group input-icon">
                                                <i class="far fa-envelope"></i>
                                                <input class="form-control" placeholder="رقم الموقف" type="text"
                                                       value="{{$member->park}}" name="park">
                                            </div>
                                        </div><!--End col-->
                                        <div class="col-sm-6">
                                            <div class=" form-group input-icon">
                                                <i class="fas fa-key"></i>
                                                <input class="form-control" placeholder="الرقم السرى" type="password"
                                                       name="password">
                                            </div>
                                        </div><!--End col-->
                                    </div><!--End row-->
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <button class="hover-button" type="submit">تعديل</button>
                                            </div><!--End Form-group-->
                                        </div><!--End col-->
                                    </div><!--End row-->
                                </form><!--End Form-->
                            </div><!--End Login-register-box-->
                        </div><!--End Col-sm-8-->
                    </div><!--End Row-->
                </div>
            </div><!--End Container-->
        </section><!--End Login-register-->

    </div><!--End page-content-->
@endsection
@section('js')
    <script>

        $('.profile-form').on('submit', function () {
            var form = $(this);
            var url = form.attr('action');

            $.ajax({
                url: url,
                method: 'POST',
                dataType: 'json',
                data: form.serialize(),
                success: function (response) {
                    $('#form-messages').modal('show');

                    var messages = response.data;
                    $('.response-messages').html('');
                    $.each(messages, function (index, message) {
                        $('.response-messages').append('<p>' + message + '</p>');
                    });

                    if (response.url) {
                        window.location.replace(response.url);
                    }

                }
            });

            return false;
        });

    </script>
@endsection