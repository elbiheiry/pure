<!DOCTYPE html>
<html>
    <head>

        <!-- Basic page needs
        ===========================-->
        <title>pure wash | @yield('title')</title>
        <meta charset="utf-8">
        <meta name="author" content="">
        <meta name="description" content="">
        <meta name="keywords" content="">

        <!-- Mobile specific metas
        ===========================-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <!-- Favicon
        ===========================-->
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/site/images/fav-icon.png')}}">


        <!-- Css Base And Vendor
        ===========================-->
        <link href="http://fonts.googleapis.com/earlyaccess/droidarabickufi.css" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('assets/site/vendor/bootstrap/css/bootstrap.css')}}">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

        <!-- Site Style
        ===========================-->

        {{--<link rel="stylesheet" href="css/price.css">--}}
        <link rel="stylesheet" href="{{asset('assets/site/vendor/wow-master/animate.css')}}">
        @if(app()->getLocale() == 'ar')
            <link rel="stylesheet" href="{{asset('assets/site/css/style.css')}}">
        @else
            <link rel="stylesheet" href="{{asset('assets/site/css/style-en.css')}}">
        @endif
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="modal fade" id="form-messages" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content text-center">
                    <div class="modal-header custom-modal">
                        <h5 class="modal-title" id="exampleModalLabel">@lang('contact.notes')</h5>
                    </div>
                    <div class="modal-body">
                        <div class="response-messages">

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="loading">
            <div class="loading-left-bg"></div>
            <div class="loading-right-bg"></div>
            <div class="loader">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
        <div id="wrapper">
            @include('site.layouts.header')
            <div class="main">
                @yield('content')
                @include('site.layouts.footer')
            </div>
            @yield('models')
        </div>
        <!--Scribts Base And Vendor
            ================================-->
        <script src="{{asset('assets/site/vendor/jquery/jquery.js')}}"></script>
        <script src="{{asset('assets/site/vendor/bootstrap/js/popper.js')}}"></script>
        <script src="{{asset('assets/site/vendor/modernizr/modernizr.js')}}"></script>
        <script src="{{asset('assets/site/vendor/nicescroll/jquery.nicescroll.min.js')}}"></script>
        <script src="{{asset('assets/site/vendor/bootstrap/js/bootstrap.js')}}"></script>
        <script src="{{asset('assets/site/vendor/isotope.pkgd.min.js')}}"></script>
        <script src="{{asset('assets/site/vendor/jquery.ripples-min.js')}}"></script>
        <script src="{{asset('assets/site/vendor/wow-master/wow.min.js')}}"></script>
        <script src="{{asset('assets/site/vendor/jquery.scrollto/jquery.scrollto.js')}}"></script>
        <script src="{{asset('assets/site/js/jquery.form.js')}}"></script>
        <script src="{{asset('assets/site/js/main.js')}}"></script>
        <script>

            function show1(){
                document.getElementById('div1').style.display ='none';
            }
            function show2(){
                document.getElementById('div1').style.display = 'block';
            }

        </script>

        <script src="{{asset('assets/admin/js/jquery.form.js')}}"></script>
        <script>
            $('.ajax-form').ajaxForm({

                beforeSend: function() {

                },
                uploadProgress: function(event, position, total, percentComplete) {

                },
                success: function(response) {
                    if (response.status === 'success'){
                        $(".ajax-form")[0].reset();
                    }
                    $('#form-messages').modal('show');

                    var messages = response.data;
                    $('.response-messages').html('');
                    $.each(messages, function( index, message ) {
                        $('.response-messages').append('<p>'+message+'</p>');
                    });
                },
                complete: function(xhr) {
                    // status.html(xhr.responseText);
                }
            });
        </script>
        @yield('js')
    </body>
</html>