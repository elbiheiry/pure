@extends('site.layouts.master')
@section('title')
    @lang('index.about')
@endsection
@section('content')
    <div class="page-head ripple-effect about-head">

        <div class="page-title-wrap">
            <h3 class="page-title">
                @lang('index.about')
            </h3>
        </div><!--End page-title-wrap-->
    </div><!--End page-head-->
    <div class="page-content">
        <section class="section-md about colored">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6  wow fadeInRight" data-wow-delay="0.2s">
                        <div class="section-head no-after-head">
                            <div class="section-title section-title-sm">
                                {{$abouts[0]->translated()->title}}
                            </div>
                        </div><!-- End Section-Head -->
                        <div class="section-content">
                            @foreach(explode("\n" , $abouts[0]->translated()->description) as $description)
                                <p>
                                    {{$description}}
                                </p>
                            @endforeach
                        </div><!-- End Section-Content -->
                    </div><!-- End col -->
                    <div class="col-lg-6  wow fadeInLeft" data-wow-delay="0.2s">
                        <div class="section-img">
                            <img src="{{asset('storage/uploads/about/'.$abouts[0]->image)}}">
                        </div><!-- End Section-img -->
                    </div><!-- End col -->
                </div><!-- End row -->
            </div><!-- End container -->
        </section>
        <section class="home-feature">
            <div class="container">

                <div class="row">
                    <div class="col-md-6">
                        <div class="icon-box  wow fadeInDown" data-wow-delay="0.2s">
                            <div class="feature-icon">
                                <i class="far fa-eye"></i>
                            </div>
                            <h3>{{$abouts[1]->translated()->title}}</h3>
                            @foreach(explode("\n" , $abouts[1]->translated()->description) as $description)
                                <p>
                                    {{$description}}
                                </p>
                            @endforeach

                        </div>

                    </div><!--End col-->
                    <div class="col-md-6">
                        <div class="icon-box  wow fadeInDown" data-wow-delay="0.4s">
                            <div class="feature-icon">
                                <i class="far fa-eye"></i>

                            </div>
                            <h3>{{$abouts[2]->translated()->title}}</h3>
                            @foreach(explode("\n" , $abouts[2]->translated()->description) as $description)
                                <p>
                                    {{$description}}
                                </p>
                            @endforeach
                        </div>

                    </div><!--End col-->

                </div><!--End row-->
            </div><!--End container-->
        </section>
    </div><!--End page-content-->
@endsection