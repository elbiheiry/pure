@extends('site.layouts.master')
@section('title')
    @lang('login.packages')
@endsection
@section('content')
    <div class="page-head">
        <div class="page-head-img">
            <img src="{{asset('assets/site/images/contact-header-bg.jpg')}}">
        </div><!--End page-head-img-->

        <div class="page-title-wrap">
            <h3 class="page-title">
                @lang('login.packages')
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
                        <li>
                            <a href="{{route('site.profile')}}">
                                @lang('login.edit')
                            </a>
                        </li>
                        <li>
                            <a href="{{route('site.orders')}}">
                                @lang('login.orders')
                            </a>
                        </li>
                        <li class="active">
                            <a href="{{route('site.packages')}}">
                                @lang('login.packages')
                            </a>
                        </li>
                        <li>
                            <a href="{{route('site.subscribtions')}}">
                                @lang('index.subscriptions')
                            </a>
                        </li>
                        <li>
                            <a href="{{route('site.logout')}}">
                                @lang('login.logout')
                            </a>
                        </li>
                    </ul><!--End nav-tabs-->
                </div><!--End item-box-->
                <div class="item-box">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="month-one" data-toggle="tab" href="#month" role="tab"
                               aria-controls="month" aria-selected="true">@lang('login.one')</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="month-3" data-toggle="tab" href="#month3" role="tab"
                               aria-controls="month3" aria-selected="false">@lang('login.three')</a>
                        </li>
                    </ul><!--End nav-tabs-->
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="month" role="tabpanel" aria-labelledby="month-one">
                            <div class="row">
                                @foreach($packages as $index => $package)
                                    <div class="col-lg-4">
                                        <div class="price-table price-{{$package->color}}">
                                            <div class="price-head">
                                                <div class="price-title">
                                                    
                                                    <span class="value">{{$package->prices()->where('size' , $size)->where('duration' , 1)->value('price')}}</span>
                                                    <span class="currency">@lang('login.SAR')</span>
                                                    <span class="period">في ال@lang('login.month')</span>
                                                </div><!--End price-title-->
                                                <span class="tagline">
                                                                <svg version="1.1" id="Layer_1"
                                                                     xmlns="http://www.w3.org/2000/svg"
                                                                     xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                                                     y="0px" viewBox="0 0 370 70.6"
                                                                     style="enable-background:new 0 0 370 70.6;"
                                                                     xml:space="preserve">
                                                                    <path class="st0"
                                                                          d="M0,0v28l159.6,39.5c16.7,4.1,34.2,4.1,50.9,0L370,28.3V0H0z"></path>
                                                                </svg>
                                                                <span>{{$package->arabic()->name}}</span>
                                                            </span><!--End tagline-->
                                            </div><!--End price-head-->
                                            <div class="price-body">
                                                <ul class="price-cont">
                                                    @foreach(explode("\n" , $package->arabic()->description) as $description)
                                                        <li>{{$description}}</li>
                                                    @endforeach
                                                </ul><!--End price-cont-->
                                                <ul class="price-cont">
                                                    @if($package->inside != 0)
                                                    <li>
                                                        {{$package->inside}} @lang('login.in')
                                                    </li>
                                                    @endif
                                                    @if($package->outside != 0)
                                                    <li>
                                                        {{$package->outside}} @lang('login.out')
                                                    </li>
                                                    @endif
                                                </ul><!--End price-cont-->

                                            </div><!--End price-body-->
                                            <a href="javascript:;"
                                               data-price="{{$package->prices()->where('size' , $size)->where('duration' , 3)->value('id')}}"
                                               class=" beckage-btn price-btn" data-url="{{route('site.wishlist')}}"
                                               data-token="{{csrf_token()}}" data-id="{{$package->id}}">
                                                <span>@lang('index.subscribe')</span>
                                            </a>
                                        </div><!--End price-table-->
                                    </div><!--End Col-md-4-->
                                @endforeach
                            </div><!--End row-->
                        </div><!--End tab-pane-->
                        <div class="tab-pane fade" id="month3" role="tabpanel" aria-labelledby="month-3">
                            <div class="row">
                                @foreach($packages as $index => $package)
                                    <div class="col-lg-4">
                                        <div class="price-table price-{{$package->color}}">
                                            <div class="price-head">
                                                <div class="price-title">
                                                    
                                                    <span class="value">{{$package->prices()->where('size' , $size)->where('duration' , 3)->value('price')}}</span>
                                                    <span class="currency">@lang('login.SAR')</span>
                                                    <span class="period">في ال@lang('login.month')</span>
                                                </div><!--End price-title-->
                                                <span class="tagline">
                                                                <svg version="1.1" id="Layer_1"
                                                                     xmlns="http://www.w3.org/2000/svg"
                                                                     xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                                                     y="0px" viewBox="0 0 370 70.6"
                                                                     style="enable-background:new 0 0 370 70.6;"
                                                                     xml:space="preserve">
                                                                    <path class="st0"
                                                                          d="M0,0v28l159.6,39.5c16.7,4.1,34.2,4.1,50.9,0L370,28.3V0H0z"></path>
                                                                </svg>
                                                                <span>{{$package->arabic()->name}}</span>
                                                            </span><!--End tagline-->
                                            </div><!--End price-head-->
                                            <div class="price-body">
                                                <ul class="price-cont">
                                                    @foreach(explode("\n" , $package->arabic()->description) as $description)
                                                        <li>{{$description}}</li>
                                                    @endforeach
                                                </ul><!--End price-cont-->
                                                <ul class="price-cont">
                                                    @if($package->inside != 0)
                                                    <li>
                                                        {{$package->inside}} @lang('login.in')
                                                    </li>
                                                    @endif
                                                    @if($package->outside != 0)
                                                    <li>
                                                        {{$package->outside}} @lang('login.out')
                                                    </li>
                                                    @endif
                                                </ul><!--End price-cont-->

                                            </div><!--End price-body-->
                                            <a href="javascript:;"
                                               data-price="{{$package->prices()->where('size' , $size)->where('duration' , 3)->value('id')}}"
                                               class=" beckage-btn price-btn" data-url="{{route('site.wishlist')}}"
                                               data-token="{{csrf_token()}}" data-id="{{$package->id}}">
                                                <span>@lang('index.subscribe')</span>
                                            </a>
                                        </div><!--End price-table-->
                                    </div><!--End Col-md-4-->
                                @endforeach
                            </div><!--End row-->

                        </div><!--End tab-pane-->
                    </div><!--End tab-content-->
                    <br>
                </div><!--End item-box-->
            </div><!--End container-->
        </section>

    </div><!--End page-content-->

@endsection
@section('js')
    <script>

        $('.beckage-btn').on('click', function () {
            var url = $(this).data('url');
            var id = $(this).data('id');
            var price = $(this).data('price');

            $.ajax({
                url: url,
                method: 'POST',
                dataType: 'json',
                data: {_token: $(this).data('token'), package_id: id, price_id: price},
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