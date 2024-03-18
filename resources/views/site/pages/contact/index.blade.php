@extends('site.layouts.master')
@section('title')
    @lang('index.contact')
@endsection
@section('content')
    <div class="page-head ripple-effect">

        <div class="page-title-wrap">
            <h3 class="page-title">
                @lang('index.contact')
            </h3>
        </div><!--End page-title-wrap-->
    </div><!--End page-head-->
    <div class="page-content">
        <section class="section-md contact colored">
            <div class="container">
                <div class="section-content">
                    <div class="row">
                        <div class="col-md-8 wow fadeInRight" data-wow-delay="0.2s">
                            <div class="contact-form item-box">
                                <div class="section-head no-after-head">
                                    <h3 class="section-title">
                                        @lang('contact.contact')
                                    </h3><!-- End Section-Title -->

                                </div><!-- End Section-Head -->

                                <form  class="form ajax-form" action="{{route('site.contact.send')}}" method="post" enctype="multipart/form-data">
                                    {!! csrf_field() !!}
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input class="form-control" value=""
                                                       name="name"
                                                       type="text" placeholder="@lang('contact.name')">

                                            </div><!-- End Form-Group -->
                                        </div><!-- End col -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input class="form-control" value=""
                                                        name="phone"
                                                       type="text"  placeholder="@lang('contact.phone')">

                                            </div><!-- End Form-Group -->
                                        </div><!-- End col -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input class="form-control" value=""
                                                        name="email"
                                                       type="email" placeholder="@lang('contact.email')">

                                            </div><!-- End Form-Group -->
                                        </div><!-- End col -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input class="form-control" value=""
                                                       name="subject"
                                                       type="text" placeholder="@lang('contact.subject')">

                                            </div><!-- End Form-Group -->
                                        </div><!-- End col -->
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <textarea class="form-control"
                                                          placeholder="@lang('contact.message')" rows="4" name="message"></textarea>

                                            </div><!-- End Form-Group -->
                                        </div><!-- End col -->
                                        <div class="col-md-12">
                                            <div class="form-group no-margin">
                                                <button class="custom-btn" type="submit" name="submit">
                                                    @lang('contact.send')
                                                </button>
                                            </div><!-- End Form-Group -->
                                        </div><!-- End col -->
                                    </div><!-- End row -->
                                </form>
                            </div><!--End contact-form-->


                        </div><!-- End col-->
                        <div class="col-md-4 wow fadeInLeft" data-wow-delay="0.2s">
                            <div class="contact-info item-box">
                                <div class="contact-widget">
                                    <div class="contact-icon">
                                        <img src="{{asset('assets/site/images/icons/contact-icon-1.png')}}">
                                    </div><!-- End Contact-Widget-Head -->
                                    <div class="contact-body">
                                        <span> @lang('contact.phone') </span>
                                        <span> {{$settings->phone}}</span>
                                    </div><!-- End Contact-Body -->
                                </div><!-- End Contact-Widget -->
                                <div class="contact-widget">
                                    <div class="contact-icon">
                                        <img src="{{asset('assets/site/images/icons/contact-icon-2.png')}}">
                                    </div><!-- End Contact-Widget-Head -->
                                    <div class="contact-body">
                                        <span> @lang('contact.email')</span>
                                        <span>
                                            {{$settings->email}}
                                        </span>
                                    </div><!-- End Contact-Body -->
                                </div><!-- End Contact-Widget -->
                                <div class="contact-widget">
                                    <div class="contact-icon">
                                        <img src="{{asset('assets/site/images/icons/contact-icon-3.png')}}">
                                    </div><!-- End Contact-Widget-Head -->
                                    <div class="contact-body">
                                        <span> @lang('contact.address') </span>
                                        <span>
                                            @if(app()->getLocale() == 'ar')
                                                {{$settings->address_ar}}
                                            @else
                                                {{$settings->address_en}}
                                            @endif
                                        </span>
                                    </div><!-- End Contact-Body -->
                                </div><!-- End Contact-Widget -->
                            </div><!-- End Contact-Info -->
                        </div><!-- End col-->
                    </div><!-- End row -->
                </div><!-- End Section-Content -->
            </div><!-- End container -->
        </section><!-- End Section -->

    </div><!--End page-content-->
@endsection