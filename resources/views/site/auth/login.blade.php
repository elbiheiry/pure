@extends('site.layouts.master')
@section('title')
    @lang('login.login')
@endsection
@section('content')
    <div class="page-head">
        <div class="page-head-img">
            <img src="{{asset('assets/site/images/contact-header-bg.jpg')}}">
        </div><!--End page-head-img-->
        <div class="page-title-wrap">
            <h3 class="page-title">
                @lang('login.login')
            </h3>
        </div><!--End page-title-wrap-->
    </div><!--End page-head-->
    <div class="page-content">
        <section class="login-register section-md colored">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-9">
                        <div class="log-reg-head">
                            <a href="{{route('site.login')}}" class="active">@lang('login.login')</a>
                            <a href="{{route('site.register')}}" class="">@lang('login.register')</a>
                        </div><!--End Login-register-tabs-->
                        <div class="login-register-box">
                            <form class="form login-ajax" action="{{route('site.login')}}" method="post">
                                {!! csrf_field() !!}
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class=" form-group input-icon">
                                            <i class="far fa-envelope"></i>
                                            <input class="form-control" placeholder="@lang('login.email')" name="email"
                                                   type="text">
                                        </div>
                                    </div><!--End col-->
                                    <div class="col-sm-6">
                                        <div class=" form-group input-icon">
                                            <i class="fas fa-key"></i>
                                            <input class="form-control" placeholder="@lang('login.password')" type="password"
                                                   name="password">
                                        </div>
                                    </div><!--End col-->
                                </div><!--End row-->
                                <div class="row remember-forget">

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="radio-check-item">
                                                <input type="checkbox" id="remember" name="remember">
                                                <label for="remember">
                                                    @lang('login.remember')
                                                </label>
                                            </div><!--End radio-check-item-->
                                        </div><!--End Form-group-->
                                    </div><!--End col-->
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <a href="{{route('site.reset')}}" class="forget-password">
                                                @lang('login.forget')
                                            </a>
                                        </div><!--End Form-group-->
                                    </div><!--End col-->
                                </div><!--End row-->
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <button class="hover-button" type="submit">@lang('login.login')</button>
                                        </div><!--End Form-group-->
                                    </div><!--End col-->
                                </div><!--End row-->

                                <div class="have-account">
                                    <i class="fa fa-long-arrow-right"></i>
                                    <a href="{{route('site.register')}}">@lang('login.account')</a>
                                </div><!--End Form-group-->
                            </form><!--End Form-->
                        </div><!--End Login-register-box-->
                    </div><!--End Col-sm-8-->
                </div><!--End Row-->
            </div><!--End Container-->
        </section><!--End Login-register-->

    </div><!--End page-content-->
@endsection
@section('js')
    <script>

        $('.login-ajax').ajaxForm({

            beforeSend: function () {

            },
            uploadProgress: function (event, position, total, percentComplete) {

            },
            success: function (response) {
                if (response.status === 'success') {
                    $(".login-ajax")[0].reset();
                    window.location.replace(response.url);
                }
                $('#form-messages').modal('show');

                var messages = response.data;
                $('.response-messages').html('');
                $.each(messages, function (index, message) {
                    $('.response-messages').append('<p>' + message + '</p>');
                });

            },
            complete: function (xhr) {
                // status.html(xhr.responseText);
            }
        });

    </script>
@endsection