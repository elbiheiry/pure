@extends('admin.layouts.master')
@section('title')
    الشركات
@endsection
@section('models')
    <div id="common-modal" class="modal fade" role="dialog">

    </div>
@endsection
@section('content')
    <div class="content">
        <div class="col-sm-12 page-heading">
            <div class="col-sm-6">
                <h2>الشركات</h2>
            </div><!--End col-md-6-->
            <div class="col-sm-6">
                <ul class="breadcrumb">
                    <li><a href="{{route('admin.dashboard')}}">الرئيسيه</a></li>
                    <li class="active">الشركات</li>
                </ul>
            </div><!--End col-md-6-->
        </div>
        <div class="spacer-15"></div>
        @if(auth()->guard('admins')->user()->role == 'admin')
            <div class="widget">
            <form class="widget-content ajax-form" action="{{route('admin.companies')}}" method="post" enctype="multipart/form-data">
                {!! csrf_field() !!}
                <div class="spacer-15"></div>
                <div class="col-md-6 form-group ">
                    <label>صوره الشركه</label>
                    <img src="{{asset('assets/admin/images/download.png')}}" class="img-responsive btn-product-image" style="cursor: pointer;">
                    <input type="file" name="logo" style="display: none;">
                    <div class="text-danger text-center">برجاء الضغط علي الوره لتغييرها</div>
                    <div class="text-danger text-center">مساحه الصوره يجب ان تكون: 130 * 130</div>
                </div>
                <div class="col-sm-6 form-group">
                    <label>اسم الشركه باللغه العربيه</label>
                    <input class="form-control" type="text" name="name_ar">
                </div>
                <div class="col-sm-6 form-group">
                    <label>اسم الشركه باللغه الانجليزيه</label>
                    <input class="form-control" type="text" name="name_en">
                </div>
                <div class="col-sm-6 form-group">
                    <label>كود الشركه</label>
                    <input class="form-control" type="text" name="code">
                </div>
                <div class="spacer-15"></div>
                <div class="col-sm-12 save-btn">
                    <button class="custom-btn green-bc" type="submit">حفظ</button>
                </div>
            </form>
        </div>
        @endif
        <div class="spacer-15"></div>
        <div class="widget">
            <div class="widget-content">
                <form method="post" action="{{route('admin.companies.delete')}}" class="ajax-form">
                    {!! csrf_field() !!}
                    <div class="col-sm-12">
                        @if(auth()->guard('admins')->user()->role == 'admin')
                            <button type="submit" class="icon-btn red-bc">
                                <i class="fa fa-trash-o"></i>
                                حذف
                            </button>
                        @endif
                    </div>
                    <div class="load-spinner" style="display: none;">
                        <i class="fa fa-spinner fa-spin"></i>
                    </div>
                    <div class="spacer-15"></div>
                    <div class="table-responsive">
                        @include('admin.pages.companies.templates.table')
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection