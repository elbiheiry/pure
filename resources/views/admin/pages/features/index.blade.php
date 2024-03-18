@extends('admin.layouts.master')
@section('title')
    المميزات
@endsection
@section('models')
    <div id="common-modal" class="modal fade" role="dialog">

    </div>
@endsection
@section('content')
    <div class="content">
        <div class="col-sm-12 page-heading">
            <div class="col-sm-6">
                <h2>المميزات</h2>
            </div><!--End col-md-6-->
            <div class="col-sm-6">
                <ul class="breadcrumb">
                    <li><a href="{{route('admin.dashboard')}}">الرئيسيه</a></li>
                    <li class="active">المميزات</li>
                </ul>
            </div><!--End col-md-6-->
        </div>
        <div class="spacer-15"></div>
        <div class="widget">
            <form class="widget-content ajax-form" action="{{route('admin.features')}}" method="post" enctype="multipart/form-data">
                {!! csrf_field() !!}
                <div class="col-md-6 form-group ">
                    <label>صوره الخدمه</label>
                    <img src="{{asset('assets/admin/images/download.png')}}" class="img-responsive btn-product-image" style="cursor: pointer;">
                    <input type="file" name="image" style="display: none;">
                    <div class="text-danger text-center">برجاء الضغط علي الصوره لتغييرها</div>
                    <div class="text-danger text-center">مساحه الصوره يجب ان تكون : 80 * 80</div>
                </div>
                <div class="spacer-15"></div>
                <div class="col-sm-6 form-group">
                    <label>اسم الميزه باللغه العربيه</label>
                    <input class="form-control" type="text" name="title_ar">
                </div>
                <div class="col-sm-6 form-group">
                    <label>اسم الميزه باللغه الانجليزيه</label>
                    <input class="form-control" type="text" name="title_en">
                </div>
                <div class="spacer-15"></div>
                <div class="col-sm-12 save-btn">
                    <button class="custom-btn green-bc" type="submit">Save</button>
                </div>
            </form>
        </div>
        <div class="spacer-15"></div>
        <div class="widget">
            <div class="widget-content">
                <form method="post" action="{{route('admin.features.delete')}}" class="ajax-form">
                    {!! csrf_field() !!}
                    <div class="col-sm-12">
                        <button type="submit" class="icon-btn red-bc">
                            <i class="fa fa-trash-o"></i>
                            حذف
                        </button>
                    </div>
                    <div class="load-spinner" style="display: none;">
                        <i class="fa fa-spinner fa-spin"></i>
                    </div>
                    <div class="spacer-15"></div>
                    <div class="table-responsive">
                        @include('admin.pages.features.templates.table')
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection