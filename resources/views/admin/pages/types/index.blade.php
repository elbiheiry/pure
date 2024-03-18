@extends('admin.layouts.master')
@section('title')
    الموديلات
@endsection
@section('models')
    <div id="common-modal" class="modal fade" role="dialog">

    </div>
@endsection
@section('content')
    <div class="content">
        <div class="col-sm-12 page-heading">
            <div class="col-sm-6">
                <h2>الموديلات</h2>
            </div><!--End col-md-6-->
            <div class="col-sm-6">
                <ul class="breadcrumb">
                    <li><a href="{{route('admin.dashboard')}}">الرئيسيه</a></li>
                    <li class="active">الموديلات</li>
                </ul>
            </div><!--End col-md-6-->
        </div>
        <div class="spacer-15"></div>
        <div class="widget">
            <form class="widget-content ajax-form" action="{{route('admin.types',['id' => $car->id])}}" method="post" enctype="multipart/form-data">
                {!! csrf_field() !!}
                <div class="spacer-15"></div>
                <div class="col-sm-6 form-group">
                    <label>الموديل باللغه العرييه</label>
                    <input class="form-control" type="text" name="name_ar">
                </div>
                <div class="col-sm-6 form-group">
                    <label>الموديل باللغه الانجليزيه</label>
                    <input class="form-control" type="text" name="name_en">
                </div>
                <div class="col-sm-6 form-group">
                    <label>حجم السياره</label>
                    <select class="form-control" name="size">
                        <option value="big">كبيره</option>
                        <option value="medium">متوسطه</option>
                        <option value="small">صغيره</option>
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
                <form method="post" action="{{route('admin.types.delete',['id' => $car->id])}}" class="ajax-form">
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
                        @include('admin.pages.types.templates.table')
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection