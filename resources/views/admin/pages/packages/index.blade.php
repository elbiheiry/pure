@extends('admin.layouts.master')
@section('title')
    الباقات
@endsection
@section('models')
    <div id="common-modal" class="modal fade" role="dialog">

    </div>
@endsection
@section('content')
    <div class="content">
        <div class="col-sm-12 page-heading">
            <div class="col-sm-6">
                <h2>الباقات</h2>
            </div><!--End col-md-6-->
            <div class="col-sm-6">
                <ul class="breadcrumb">
                    <li><a href="{{route('admin.dashboard')}}">الرئيسيه</a></li>
                    <li class="active">الباقات</li>
                </ul>
            </div><!--End col-md-6-->
        </div>
        <div class="spacer-15"></div>
        <div class="widget">
            <form class="widget-content ajax-form" action="{{route('admin.packages',['id' => $id])}}" method="post" enctype="multipart/form-data">
                {!! csrf_field() !!}
                <div class="spacer-15"></div>


                <div class="col-md-6 form-group">
                    <label>اسم الباقه باللغه العربيه</label>
                    <input class="form-control" type="text" name="name_ar">
                </div>
                <div class="col-md-6 form-group">
                    <label>اسم الباقه باللغه الانجليزيه</label>
                    <input class="form-control" type="text" name="name_en">
                </div>
                <div class="col-md-6 form-group">
                    <label>وصف الباقه بالعربيه</label>
                    <textarea class="form-control" name="description_ar"></textarea>
                </div>
                <div class="col-md-6 form-group">
                    <label>وصف الباقه بالانجليزيه</label>
                    <textarea class="form-control" name="description_en"></textarea>
                </div>
                <div class="col-md-6 form-group">
                    <label>عدد الغسلات الخارجيه</label>
                    <input type="number" class="form-control" name="inside">
                </div>
                <div class="col-md-6 form-group">
                    <label>عدد الغسلات الخارجيه الداخليه</label>
                    <input type="number" class="form-control" name="outside">
                </div>
                <div class="col-md-6 form-group">
                    <label>اللون</label>
                    <select class="form-control" name="color">
                        <option value="none">زرقاء</option>
                        <option value="gold">ذهبيه</option>
                        <option value="silver">فضيه</option>
                    </select>
                </div>
                <div class="spacer-15"></div>
                <div class="col-sm-12 save-btn">
                    <button class="custom-btn green-bc" type="submit">حفظ</button>
                </div>
            </form>
        </div>
        <div class="spacer-15"></div>
        <div class="widget">
            <div class="widget-content">
                <form method="post" action="{{route('admin.packages.delete',['id' => $id])}}" class="ajax-form">
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
                        @include('admin.pages.packages.templates.table')
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection