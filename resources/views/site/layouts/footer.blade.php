<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="widget">
                    <div class="widget-head">
                        <h3 class="title">@lang('index.support')</h3>
                    </div><!--End widget-head-->
                    <div class="widget-content">
                        <p>
                            @if(app()->getLocale() == 'ar')
                                {{$settings->brief_ar}}
                                @else
                                {{$settings->brief_en}}
                            @endif
                        </p>
                        <ul class="social-list">
                            @if($settings->facebook != null)
                                <li>
                                    <a href="{{$settings->facebook}}" target="_blank">
                                        <i class="fab fa-facebook"></i>
                                    </a>
                                </li>
                            @endif
                            @if($settings->twitter != null)
                                <li>
                                    <a href="{{$settings->twitter}}" target="_blank">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                </li>
                            @endif
                            @if($settings->instagram != null)
                                <li>
                                    <a href="{{$settings->instagram}}" target="_blank">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                </li>
                            @endif
                            @if($settings->youtube != null)
                                <li>
                                    <a href="{{$settings->youtube}}" target="_blank">
                                        <i class="fab fa-youtube"></i>
                                    </a>
                                </li>
                            @endif
                        </ul><!--End social-list-->
                    </div><!--End widget-content-->
                </div><!--End footer-about-->
            </div><!--End col-->
            <div class="col-lg-4">
                <div class="widget">
                    <div class="widget-head">
                        <h3 class="title">@lang('index.info')</h3>
                    </div><!--End widget-head-->
                    <div class="widget-content">
                        <ul class="contact-list">
                            <li>
                                <i class="fas fa-map-marker-alt"></i>
                                @if(app()->getLocale() == 'ar')
                                    {{$settings->address_ar}}
                                @else
                                    {{$settings->address_en}}
                                @endif
                            </li>
                            <li>
                                <i class="fab fa-whatsapp"></i>
                                {{$settings->phone}}
                            </li>
                            <li>
                                <i class="far fa-envelope"></i>
                                {{$settings->email}}
                            </li>
                        </ul><!--End contact-list-->
                    </div><!--End widget-content-->
                </div><!--End widget-->
            </div><!--End col-->
            <div class="col-lg-3">
                <div class="widget">
                    <div class="widget-head">
                        <h3 class="title">@lang('index.news')</h3>
                    </div><!--End widget-head-->
                    <div class="widget-content">
                        <form class="ajax-form newsletter" action="{{route('site.subscribe')}}" method="post">
                            {!! csrf_field() !!}

                            <input class="form-control" placeholder="البريد الالكترونى" type="email" name="email">
                            <button type="submit">@lang('index.subscribe')</button>
                        </form>
                        <p class="newsletter-par">
                            @lang('index.subscribe_details')
                        </p>
                    </div><!--End widget-content-->
                </div><!--End widget-->
            </div><!--End col-->
        </div><!--End Row-->
    </div><!--End container-->
    <div class="copyright">
        <div class="container">
            <p>
                @if(app()->getLocale() == 'ar')
                © 2018 جميع الحقوق محفوظة ل بيور واش
                    @else
                    all copyright are reserved for pure wash ©
                @endif
            </p>
            <a target="_blank" href="http://upureka.com/">
                @if(app()->getLocale() == 'ar')
                تصميم وتطوير upureka
                    @else
                    designed and developed by upureka
                @endif
            </a>
        </div><!--End container-->
    </div><!--End copyright-->
</footer><!--End footer-->
