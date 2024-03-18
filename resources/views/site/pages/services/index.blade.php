@extends('site.layouts.master')
@section('title')
    @lang('index.services')
@endsection
@section('content')
    <div class="page-head ripple-effect services-head">

        <div class="page-title-wrap">
            <h3 class="page-title">
                @lang('index.services')
            </h3>
        </div><!--End page-title-wrap-->
    </div><!--End page-head-->
    <div class="page-content">
        <section class="section-md about colored wow fadeInDown" data-wow-delay="0.2s">
            <div class="container">
                <div class="row">
                    @foreach($services as $service)
                    <div class="col-md-6">
                        <div class="product-block">
                            <div class="product-block--head custom-hover">
                                <img src="{{asset('storage/uploads/services/'.$service->image)}}" alt="">

                                <figcaption></figcaption>
                            </div><!-- End product-block--head -->
                            <div class="product-block--content">
                                <h3 class="title">
                                    {{$service->translated()->title}}
                                </h3>
                                <p>
                                    {{$service->translated()->description}}
                                </p>
                            </div><!-- End product-block--content -->
                        </div>

                    </div><!--End col-->
                    @endforeach
                </div><!-- End row -->
            </div><!-- End container -->
        </section>

    </div><!--End page-content-->

@endsection