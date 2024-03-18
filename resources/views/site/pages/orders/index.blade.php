@extends('site.layouts.master')
@section('title')
    @lang('login.orders')
@endsection
@section('content')
    <div class="page-head">
        <div class="page-head-img">
            <img src="{{asset('assets/site/images/contact-header-bg.jpg')}}">
        </div><!--End page-head-img-->

        <div class="page-title-wrap">
            <h3 class="page-title">
                @lang('login.orders')
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
                        <li class="active">
                            <a href="{{route('site.orders')}}">
                                @lang('login.orders')
                            </a>
                        </li>
                        <li>
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
                    <div class="table-wrap">

                        <table class="table-orders">
                            <thead>
                            <tr>
                                <th class="orders-code">@lang('index.code')</th>
                                <th class="orders-name">@lang('index.name')</th>
                                <th class="orders-price">@lang('index.price')</th>
                                <th class="orders-start">@lang('index.date')</th>
                                <th class="orders-end">@lang('index.end')</th>
                                <th class="orders-payment">@lang('index.payment')</th>
                                <th class="orders-status">@lang('index.status')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($wishlists as $wishlist)
                                <tr>
                                    <td class="orders-code">
                                        <p>{{$wishlist->id}}</p>
                                    </td>
                                    <td class="orders-name">
                                        <p>{{$wishlist->package->translated()->name}}</p>
                                    </td>
                                    <td class="orders-price">
                                        <p>{{$wishlist->package->prices()->where('size' , $size)->where('duration' , $wishlist->price['duration'])->value('price')}}
                                            @lang('login.SAR')</p>
                                    </td>
                                    <td class="orders-start">
                                        <p>{{$wishlist->created_at->format('d/m/Y')}}</p>
                                    </td>
                                    <td class="orders-end">
                                        <p>{{\Carbon\Carbon::parse($wishlist->created_at)->addMonths($wishlist->price['duration'])->format('d/m/Y')}}</p>
                                    </td>
                                    <td class="orders-payment">
                                        <p>{{$wishlist->payment}}</p>
                                    </td>
                                    <td class="orders-status">
                                        <p class="green">{{$wishlist->status}}</p>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div><!--End table-wrap-->
                </div><!--End item-box-->
            </div><!--End container-->
        </section>

    </div><!--End page-content-->
@endsection