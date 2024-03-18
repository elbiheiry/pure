@extends('site.layouts.master')
@section('title')
    @lang('index.home')
@endsection
@section('content')
    <div class="home-slider ripple-effect">
        <div class="slider-cell">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 wow fadeInRight" data-wow-duration="0.7s" data-wow-delay="1s">
                        <h3 class="title"> {{$home->translated()->title}}</h3>
                        <p>{{$home->translated()->description}}</p>

                        <a class="custom-btn scroll-sec" href="#home-services">@lang('index.more')</a>
                    </div><!--End col-->
                </div><!---End row-->
            </div><!--End container-->
        </div><!--End slider-cell-->
    </div><!--End home-slider-->

    <div class="page-content">
        <section class="colored home-services" id="home-services">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-head text-center wow fadeInDown">
                            <h3 class="section-title">
                                @lang('index.pure_services')
                            </h3><!--End section-title-->

                        </div>
                    </div><!--End col-->
                </div><!--End row-->
                <div class="row">
                    @foreach($services as $service)
                        <div class="col-md-4 wow fadeInDown" data-wow-delay="0.2s">
                            <div class="service-box">
                                <div class="service-img custom-hover">
                                    <img src="{{asset('storage/uploads/services/'.$service->image)}}" alt="image">
                                    <figcaption></figcaption>
                                    <div class="service-detail">
                                        <p>{{$service->translated()->description}}</p>
                                    </div><!--End service-detail-->
                                </div><!--End service-img-->
                                <div class="service-name">
                                    <h3>{{$service->translated()->title}}
                                        <span class="service-icon">
                                            <i class="fas fa-car"></i>
                                        </span>
                                    </h3>
                                </div><!--End service-name-->
                            </div><!--End service-box-->
                        </div><!--End col-->
                    @endforeach
                </div><!--End row-->
            </div><!--End container-->
        </section>
        <section class="colored mission-vision wow fadeInDown" data-wow-delay="0.8s">
            <div class="mission-part">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 absolute-img mission-img">
                            <img src="{{asset('assets/site/images/mission-img.jpg')}}">
                        </div><!-- End col -->
                        <div class="col-md-6 mission-content">
                            <h3 class="title title-lg"> {{$abouts[0]->translated()->title}}</h3>
                            @php(
                                $description1 = explode("\n" , $abouts[0]->translated()->description)
                            )
                            <p>{{$description1[0]}}</p>
                        </div><!-- End Mission-Content -->
                    </div><!-- End row -->
                </div><!-- End container -->
            </div><!-- End Mission-Part -->
            <div class="vision-part">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 absolute-img vision-img">
                            <img src="{{asset('assets/site/images/vision-img.jpg')}}">
                        </div><!-- End col -->
                        <div class="col-md-6 vision-content">
                            <h3 class="title title-lg"> {{$abouts[1]->translated()->title}}</h3>
                            @php(
                                $description2 = explode("\n" , $abouts[1]->translated()->description)
                            )
                            <p>{{$description2[0]}}</p>
                        </div><!-- End Mission-Content -->
                        </div><!-- End Vision-Content -->
                    </div><!-- End row -->
                </div><!-- End container -->
            </div><!-- End Vision-Part -->
        </section><!-- End Section -->


    </div><!--End page-content-->
@endsection