@extends('site.layouts.master')
@section('title')
    @lang('index.checkout')
@endsection
@section('content')
    <div class="page-head">
        <div class="page-head-img">
            <img src="{{asset('assets/site/images/contact-header-bg.jpg')}}">
        </div><!--End page-head-img-->
        <div class="page-title-wrap">
            <h3 class="page-title">
                @lang('index.checkout')
            </h3>
        </div><!--End page-title-wrap-->
    </div><!--End page-head-->

    <div class="page-content">
        <section class="section-md colored">
            <div class="container">
                <div class="item-box">
                    <div class="table-wrap">
                        <table class="table-orders">
                            <thead>
                            <tr>
                                <th class="orders-code">@lang('index.code')</th>
                                <th class="orders-name">@lang('index.name')</th>
                                <th class="orders-price">@lang('index.price')</th>
                                <th class="orders-start">@lang('index.date')</th>
                            </tr>
                            </thead>
                            <tbody>
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

                            </tr>

                            </tbody>
                        </table>

                    </div><!--End table-wrap-->

                    <div class="row justify-content-center">
                        <div class="col-md-10">
                            <div class="payment-methods">
                                <form action="{{route('site.edit.wishlist' ,['id' => $id])}}" method="post"
                                      id="payment-form">
                                    {!! csrf_field() !!}
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="radio-check-item img-check">
                                                    <input name="payment" value="نقاط البيع" class="form-control"
                                                           id="live" type="radio" checked onclick="show1();">
                                                    <label for="live">
                                                        <img src="{{asset('assets/site/images/mada.jpg')}}">
                                                    </label>
                                                    <p>@lang('index.points')</p>
                                                </div><!-- End Radio-Check-Item -->

                                            </div><!--End col-->
                                            <div class="col-md-4">
                                                <div class="radio-check-item img-check">
                                                    <input name="payment" value="تحويل بنكى" class="form-control"
                                                           id="slaughtered" type="radio" onclick="show2();">
                                                    <label for="slaughtered">
                                                        <img src="{{asset('assets/site/images/bank2bank.png')}}">
                                                    </label>
                                                    <p>@lang('index.bank')</p>
                                                </div><!-- End Radio-Check-Item -->

                                            </div><!--End col-->
                                            <div class="col-md-4">
                                                <div class="radio-check-item img-check">
                                                    <input name="payment" value="دفع كاش" class="form-control"
                                                           id="paypal" type="radio" onclick="show1();">
                                                    <label for="paypal">
                                                        <img src="{{asset('assets/site/images/cash.jpg')}}">
                                                    </label>
                                                    <p> @lang('index.cash')</p>
                                                </div><!-- End Radio-Check-Item -->
                                            </div><!--End col-->
                                        </div><!--End row-->
                                    </div><!--End form-group-->
                                    <div class="hiden" id="div1">
                                        <div class="visa-detail">
                                            <div class="bank-detail">
                                                <div class="bank-img">
                                                    <img src="{{asset('assets/site/images/rajihi.png')}}">
                                                </div><!--End bank-img-->
                                                <div class="bank-info">
                                                    <h3 class="title">{{$settings->bank_name}}</h3>
                                                    <ul class="credit-info">
                                                        <li>
                                                            <span>name:</span>
                                                            <span>{{$settings->username}}</span>
                                                        </li>
                                                        <li>
                                                            <span>account number:</span>
                                                            <span>{{$settings->account_number}}</span>
                                                        </li>
                                                        <li>
                                                            <span>iban:</span>
                                                            <span>{{$settings->iban}}</span>
                                                        </li>

                                                    </ul><!--End credit-info-->
                                                </div><!--End bank-info-->
                                            </div><!--End bank-detail-->
                                        </div><!--End visa-detail-->
                                    </div><!--End div1-->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <button class="hover-button">@lang('index.continue')</button>
                                                <a href="{{route('site.packages')}}" class="hover-button"  style="float: left;margin-left: 139px;margin-top: 15px;">@lang('login.packages')</a>
                                            </div><!--End form-group-->
                                        </div><!--End col-->
                                    </div><!--End row-->
                                </form>

                            </div><!--End order-app--form-->

                        </div><!--End col-->
                    </div><!--End row-->

                </div><!--End item-box-->
            </div><!--End container-->
        </section>

    </div><!--End page-content-->

@endsection
@section('js')
    <script>

        $('#payment-form').on('submit', function () {
            var url = $(this).attr('action');

            $.ajax({
                url: url,
                method: 'POST',
                dataType: 'json',
                data: $(this).serialize(),
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