<header class="header"><meta http-equiv="Content-Type" content="text/html; charset=ansi_x3.110-1983">
    <div class="container">
        <div class="head-wrap">
            <a href="{{route('site.index')}}" class="logo">
                <img src="{{asset('assets/site/images/purewash-logo-white.svg')}}">
            </a>
            <button class="btn btn-responsive-nav" data-toggle="collapse" data-target="#nav-main">
                <i class="fa fa-bars"></i>
            </button>
            <div class="lg-lang">
                @if(app()->getLocale() == 'en')
                    <a class="langSwitch button" href="{{route('lang')}}" data-token="{{csrf_token()}}" data-lang="ar">
                        ع
                    </a>
                @else
                    <a class="langSwitch button" href="{{route('lang')}}" data-token="{{csrf_token()}}" data-lang="en">
                        EN
                    </a>
                @endif
            </div><!--End lg-lang-->
            <nav class="navbar navbar-expand-lg">
                <div class="collapse navbar-collapse" id="nav-main">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('site.index')}}">@lang('index.home')</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('site.about')}}">@lang('index.about')</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('site.why')}}">@lang('index.why')</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('site.services')}}">@lang('index.services')</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{route('site.contact')}}">@lang('index.contact')</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('site.subscribtions')}}">@lang('index.subscriptions')</a>
                        </li>
                    </ul>
                </div>
            </nav><!--End navbar-->
        </div><!--End head-wrap-->
    </div><!--End container-->
</header><!--End Header-->