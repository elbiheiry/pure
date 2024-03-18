@extends('site.layouts.master')
@section('title')
    @lang('index.subscriptions')
@endsection
@section('content')
    <div class="page-head">
        <div class="page-head-img">
            <img src="{{asset('assets/site/images/contact-header-bg.jpg')}}">
        </div><!--End page-head-img-->

        <div class="page-title-wrap">
            <h3 class="page-title">
                @lang('index.subscriptions')
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
                        <li>
                            <a href="{{route('site.packages')}}">
                                @lang('login.packages')
                            </a>
                        </li>
                        <li class="active">
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
                <div class="item-box my-beckages">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-wrap">
                                <table class="table-beckages">
                                    <thead>
                                    <tr>
                                        <th class="laundry-kind">@lang('subscribtions.type')</th>
                                        <th class="laundry-date">@lang('subscribtions.date')</th>
                                        <th class="laundry-status">@lang('subscribtions.status')</th>
                                        <th class="laundry-note">@lang('subscribtions.notes')</th>
                                        <th class="laundry-edit">@lang('subscribtions.edit')</th>
                                        <th class="laundry-support">@lang('subscribtions.support')</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if($wishlist)
                                        @foreach($wishlist->washes as $wash)
                                            <tr>
                                                <td class="laundry-kind">
                                                    {{$wash->type}}
                                                </td>
                                                <td class="laundry-date">
                                                    {{$wash->date}}
                                                </td>
                                                <td class="laundry-status">
                                                    @if($wash->status == 'تم الغسل')
                                                        <div class="status-wrap">
                                                            <div class="on-off">
                                                                <button type="button" class="btn btn-toggle active">
                                                                    <div class="handle"></div>
                                                                </button>

                                                                <p class="green">{{$wash->status}}</p>
                                                            </div><!--End on-off-->
                                                        </div><!--End status-wrap-->
                                                    @else
                                                        <div class="status-wrap">
                                                            <div class="on-off">
                                                                <button type="button" class="btn btn-toggle">
                                                                    <div class="handle"></div>
                                                                </button>

                                                                <p class="yellow">{{$wash->status}}</p>
                                                            </div><!--End on-off-->
                                                        </div><!--End status-wrap-->
                                                    @endif
                                                </td>
                                                <td class="laundry-note">
                                                    {{$wash->comments}}
                                                </td>
                                                <td class="laundry-edit">
                                                    <a href="" data-toggle="modal" data-target="#beckage-modal"
                                                       data-id="{{$wash->id}}" class="red EditWash">@lang('subscribtions.edit')</a>

                                                </td>
                                                <td class="laundry-support">
                                                    <a href="" data-toggle="modal" data-target="#support-modal"
                                                       data-id="{{$wash->id}}" class="green ContactWash">@lang('subscribtions.contact')</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table><!--End table-cart -->
                            </div><!--End table-wrap-->
                        </div><!--End col-->
                    </div><!--End row-->
                </div><!--End item-box-->
            </div><!--End container-->
        </section>

    </div><!--End page-content-->
@endsection
@section('models')

    <div class="modal fade beckage-modal" id="beckage-modal" tabindex="-1" role="dialog"
         aria-labelledby="beckage-modalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{route('site.note')}}" method="post" class="note-ajax">
                    {!! csrf_field() !!}
                    <input type="hidden" name="wash_id" value="" class="WashId">
                    <div class="modal-body">
                        <div class="edit-beckage">
                            <div class="form-group">
                                <div class="radio-check-item">
                                    <input name="slaughtered_live" value="تاجيل" class="form-control" id="slaughtered"
                                           type="radio" onclick="show2();">
                                    <label for="slaughtered">@lang('subscribtions.delay')</label>
                                </div><!-- End Radio-Check-Item -->
                                <div class="radio-check-item">
                                    <input name="slaughtered_live" value="الغاء" class="form-control" id="live"
                                           type="radio" onclick="show1();" checked>
                                    <label for="live">@lang('subscribtions.cancel')</label>
                                </div><!-- End Radio-Check-Item -->

                            </div><!--End form-group-->
                            <div class="hide" id="div1">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group input-icon">
                                            <i class="far fa-clock"></i>
                                            <input type="date" name="date" placeholder="@lang('subscribtions.to')" class="form-control">
                                        </div><!--End form-group-->
                                    </div><!--End col-md-5-->
                                </div><!--End row-->
                            </div><!--End div1-->
                            <div class="form-group input-icon input-textarea">
                                <i class="far fa-sticky-note"></i>
                                <textarea rows="5" name="comments" class="form-control"></textarea>
                            </div><!--End form-group-->
                            <button class="hover-button" type="submit">@lang('subscribtions.send')</button>

                        </div><!--End edit-beckage-->
                    </div><!--End modal-body-->
                </form>
            </div><!--End modal-content-->
        </div><!--End modal-dialog-->
    </div><!--End modal-->


    <div class="modal fade support-modal" id="support-modal" tabindex="-1" role="dialog"
         aria-labelledby="beckage-modalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{route('site.contact')}}" method="post" class="contact-ajax">
                    {!! csrf_field() !!}
                    <input type="hidden" name="wash_id" value="" id="WashId">
                    <div class="modal-body">
                        <div class="edit-beckage">
                            <div class="form-group input-icon">
                                <i class="fas fa-key"></i>
                                <input class="form-control" name="subject" placeholder="الموضوع" type="text">
                            </div><!--End form-group-->
                            <div class="form-group input-icon input-textarea">
                                <i class="far fa-sticky-note"></i>
                                <textarea rows="5" class="form-control" name="message"
                                          placeholder="@lang('subscribtions.notes')"></textarea>
                            </div><!--End form-group-->
                            <button class="hover-button" type="submit">@lang('subscribtions.send')</button>
                        </div><!--End edit-beckage-->
                    </div><!--End modal-body-->
                </form>
            </div><!--End modal-content-->
        </div><!--End modal-dialog-->
    </div><!--End modal-->
@endsection
@section('js')

    <script>
        $('.contact-ajax').ajaxForm({

            beforeSend: function () {

            },
            uploadProgress: function (event, position, total, percentComplete) {

            },
            success: function (response) {
                $('.support-modal').modal('hide');
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

        $('.note-ajax').ajaxForm({

            beforeSend: function () {

            },
            uploadProgress: function (event, position, total, percentComplete) {

            },
            success: function (response) {
                $('.beckage-modal').modal('hide');
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

        $('.EditWash').on('click', function () {
            var id = $(this).data('id');

            $('.WashId').val(id);
        });

        $('.ContactWash').on('click', function () {
            var id = $(this).data('id');

            $('#WashId').val(id);
        });
    </script>
@endsection