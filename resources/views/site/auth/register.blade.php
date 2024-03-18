@extends('site.layouts.master')
@section('title')
    @lang('login.member')
@endsection
@section('content')
    <div class="page-head">
        <div class="page-head-img">
            <img src="{{asset('assets/site/images/contact-header-bg.jpg')}}">
        </div><!--End page-head-img-->
        <div class="page-title-wrap">
            <h3 class="page-title">
                @lang('login.member')
            </h3>
        </div><!--End page-title-wrap-->
    </div><!--End page-head-->
    <div class="page-content">
        <section class="login-register section-md colored">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-9">
                        <div class="log-reg-head">
                            <a href="{{route('site.login')}}" class="">@lang('login.login')</a>
                            <a href="{{route('site.register')}}" class="active">@lang('login.register')</a>
                        </div><!--End Login-register-tabs-->
                        <div class="login-register-box">
                            <form class="form register-ajax" action="{{route('site.register')}}" method="post" >
                                {!! csrf_field() !!}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class=" form-group input-icon">
                                            <i class="fas fa-barcode"></i>
                                            <input class="form-control" placeholder="@lang('login.code')" name="code" type="text">
                                        </div>
                                    </div><!--End col-->
                                    <div class="col-md-6">
                                        <div class=" form-group input-icon">
                                            <i class="fas fa-mobile-alt"></i>
                                            <input class="form-control" placeholder="@lang('login.phone')"  name="phone" type="text">
                                        </div>
                                    </div><!--End col-->
                                    <div class="col-md-6">
                                        <div class=" form-group input-icon">
                                            <i class="far fa-user"></i>
                                            <input class="form-control" placeholder="@lang('login.first')" name="first_name" type="text">
                                        </div>
                                    </div><!--End col-->
                                    <div class="col-md-6">
                                        <div class=" form-group input-icon">
                                            <i class="far fa-user"></i>
                                            <input class="form-control" placeholder="@lang('login.last')" name="last_name" type="text">
                                        </div>
                                    </div><!--End col-->
                                    <div class="col-md-6">
                                        <div class=" form-group input-icon">
                                            <i class="far fa-envelope"></i>
                                            <input class="form-control" placeholder="@lang('login.email')" name="email" type="email">
                                        </div>
                                    </div><!--End col-->
                                    <div class="col-md-6">
                                        <div class=" form-group input-icon">
                                            <i class="fas fa-charging-station"></i>

                                            <input class="form-control" placeholder="@lang('login.park')" name="park" type="text">
                                        </div>
                                    </div><!--End col-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <select class="form-control" name="car_id" id="Car" data-url="{{route('site.types')}}">
                                                <option value="0">@lang('login.model')</option>
                                                @foreach($cars as $car)
                                                    <option value="{{$car->id}}">{{$car->arabic()->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div><!--End col-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <select class="form-control" name="type_id" id="CarType" disabled>
                                                <option value="0">@lang('login.type')</option>
                                            </select>
                                        </div>
                                    </div><!--End col-->
                                    <div class="col-md-6">
                                        <div class="form-group input-icon">
                                            <i class="fas fa-car"></i>
                                            <input type="text" class="form-control" placeholder="@lang('login.color')" name="color">
                                        </div>
                                    </div><!--End col-->
                                    <div class="col-md-6">
                                        <div class="form-group input-icon">
                                            <i class="fas fa-car"></i>
                                            <input type="number" class="form-control" placeholder="@lang('login.year')" name="year">
                                        </div>
                                    </div><!--End col-->
                                    <div class="col-md-6">
                                        <div class=" form-group input-icon">
                                            <i class="fas fa-car"></i>
                                            <input class="form-control" placeholder="@lang('login.plate')" name="plate_number" type="text">
                                        </div>
                                    </div><!--End col-->
                                    <div class="col-md-6">
                                        <div class=" form-group input-icon">
                                            <i class="fas fa-key"></i>
                                            <input class="form-control" placeholder="@lang('login.password')" name="password" type="password">
                                        </div>
                                    </div><!--End col-->
                                    <div class="col-md-6">
                                        <div class=" form-group input-icon">
                                            <i class="fas fa-key"></i>
                                            <input class="form-control" placeholder="@lang('login.confirm')" type="password" name="re_password">
                                        </div>
                                    </div><!--End col-->
                                </div><!--End row-->
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <button class="hover-button" type="submit">@lang('login.create')</button>
                                        </div><!--End Form-group-->
                                    </div><!--End col-->
                                </div><!--End row-->
                                <div class="have-account">
                                    <i class="fa fa-long-arrow-right"></i>
                                    <a href="{{route('site.login')}}">@lang('login.login')</a>
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
        $(document).on('change', '#Car', function () {

            var $this = $(this);
            var originalHtml = $this.html();
            var car = $(this).val();

            $.ajax({
                url : $(this).data('url'),
                method : 'GET',
                data: {id : car},
                success : function (data) {
                    $('#CarType').removeAttr('disabled');
                    $('#CarType').html(data);
                }
            });
        });

        $('.register-ajax').ajaxForm({

            beforeSend: function() {

            },
            uploadProgress: function(event, position, total, percentComplete) {

            },
            success: function(response) {
                if (response.status === 'success'){
                    $(".register-ajax")[0].reset();
                    window.location.replace(response.url);
                }
                $('#form-messages').modal('show');

                var messages = response.data;
                $('.response-messages').html('');
                $.each(messages, function( index, message ) {
                    $('.response-messages').append('<p>'+message+'</p>');
                });
            },
            complete: function(xhr) {
                // status.html(xhr.responseText);
            }
        });

    </script>
@endsection