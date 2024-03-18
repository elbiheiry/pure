@extends('site.layouts.master')
@section('title')
    @lang('index.why')
@endsection
@section('content')
    <div class="page-head ripple-effect why-head">

        <div class="page-title-wrap">
            <h3 class="page-title">
                @lang('index.why')
            </h3>
        </div><!--End page-title-wrap-->
    </div><!--End page-head-->
    <div class="page-content">
        <section class="section-md about colored">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 wow fadeInRight" data-wow-delay="0.2s">
                        <div class="section-head no-after-head">
                            <div class="section-title section-title-sm">
                                {{$whies[0]->translated()->title}}
                            </div>
                        </div><!-- End Section-Head -->
                        <div class="section-content">
                            <p>
                                {{$whies[0]->translated()->description}}
                            </p>
                        </div><!-- End Section-Content -->
                    </div><!-- End col -->
                    <div class="col-lg-6 wow fadeInLeft" data-wow-delay="0.2s">
                        <div class="section-img no-shadow">
                            <img src="{{asset('storage/uploads/why/'.$whies[0]->image)}}">
                        </div><!-- End Section-img -->
                    </div><!-- End col -->
                </div><!-- End row -->
            </div><!-- End container -->
        </section>
        <section class="team colored">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 wow fadeInRight" data-wow-delay="0.2s">
                        <div class="team-img">
                            <img src="{{asset('storage/uploads/why/'.$whies[1]->image)}}">
                        </div><!-- End Section-img -->
                    </div><!-- End col -->
                    <div class="col-md-1"></div>
                    <div class="col-lg-7 wow fadeInLeft" data-wow-delay="0.2s">
                        <div class="section-head no-after-head">
                            <div class="section-title">
                                {{$whies[1]->translated()->title}}
                            </div>
                        </div><!-- End Section-Head -->
                        <div class="section-content">
                            <p>{{$whies[1]->translated()->description}}</p>
                        </div><!-- End Section-Content -->
                    </div><!-- End col -->

                </div><!-- End row -->
            </div><!-- End container -->
        </section>

    </div><!--End page-content-->
@endsection