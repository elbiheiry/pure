<!DOCTYPE html>
<html>
    <head>
        <!-- Meta Tags
        ======================-->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- ==== Document Meta ==== -->
        <meta name="description" content="{{$settings->name}}">
        <meta name="keywords"
              content="blog, blogging, personal, clean, modern, masonry, simple, html5, css3, template, responsive">
        <meta name="author" content="ThemeLooks">

        <!-- Title Name
        ================================-->
        <title>{{$settings->name}} | @yield('title')</title>

        <!-- Google Web Fonts
        ===========================-->
        <link href="http://fonts.googleapis.com/earlyaccess/droidarabickufi.css" rel="stylesheet" type="text/css">

        <!-- Fave Icons
        ================================-->
        <link rel="shortcut icon" href="{{asset('assets/admin/images/fav-icon.png')}}">

        <!-- Css Base And Vendor
        ===================================-->
        <link rel="stylesheet" href="{{asset('assets/admin/vendor/bootstrap/bootstrap-ar.css')}}">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" media="all">
        <link href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css" rel="stylesheet" >
        <link rel="stylesheet" href="{{asset('assets/admin/vendor/animation/animate.css')}}">

        <!-- Site Css
        ====================================-->
        <link rel="stylesheet" href="{{asset('assets/admin/css/style.css')}}">
        <link rel="stylesheet" href="{{asset('assets/admin/css/theme/default-theme.css')}}">
    </head>
    <body>
        <div id="wrapper">
            <div class="modal fade" id="delete-user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content text-center">
                        <div class="modal-header custom-modal">
                            <h5 class="modal-title" id="exampleModalLabel">الملاحظات</h5>
                        </div>
                        <div class="modal-body">
                            <div class="error-messages">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @yield('models')
            <div class="main">

                <!-- SIDEBAR -->
                @include('admin.layouts.sidebar')
                <div class="page-content">

                    <!-- HEADER -->
                    @include('admin.layouts.header')

                    <!-- CONTENT -->
                    @yield('content')
                </div><!--End Page-Content-->
            </div><!--End Main-->
        </div><!--End wrapper-->

        <!-- JS Base And Vendor
        ===================================-->
        <script src="{{asset('assets/admin/vendor/jquery/jquery.js')}}"></script>
        <script src="{{asset('assets/admin/vendor/bootstrap/bootstrap.js')}}"></script>
        <script src="{{asset('assets/admin/js/jquery.form.js')}}"></script>
{{--        <script src="{{asset('assets/admin/vendor/font-awosame/font-awosame.js')}}"></script>--}}
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
        
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
        
        
{{--        <script type="text/javascript" src="{{asset('assets/admin/vendor/datatables.min.js')}}"></script>--}}
        <script src="{{asset('assets/admin/vendor/count-to/jquery.countTo.js')}}"></script>

        <!--JS Main
        ====================================-->
        <script src="{{asset('assets/admin/js/main.js')}}"></script>
        <script src="{{asset('assets/admin/js/admin.js')}}"></script>

        @yield('js')
    </body>
</html>