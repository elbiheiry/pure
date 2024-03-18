@extends('admin.layouts.master')
@section('title')
    الاسعار
@endsection
@section('models')
    <div id="common-modal" class="modal fade" role="dialog">

    </div>
@endsection
@section('content')
    <div class="content">
        <div class="col-sm-12 page-heading">
            <div class="col-sm-6">
                <h2>الاسعار</h2>
            </div><!--End col-md-6-->
            <div class="col-sm-6">
                <ul class="breadcrumb">
                    <li><a href="{{route('admin.dashboard')}}">الرئيسيه</a></li>
                    <li class="active">الاسعار</li>
                </ul>
            </div><!--End col-md-6-->
        </div>
        <div class="spacer-15"></div>
        <div class="widget">
            <form class="widget-content ajax-form" action="{{route('admin.prices',['id' => $id])}}" method="post" enctype="multipart/form-data">
                {!! csrf_field() !!}
                <div class="spacer-15"></div>
                <div class="col-md-6 form-group">
                    <label>السعر</label>
                    <input class="form-control" type="text" name="price">
                </div>
                <div class="col-md-6 form-group">
                    <label>مده الباقه</label>
                    <input class="form-control" type="text" name="duration">
                </div>

                <div class="col-md-6 form-group">
                    <label>الحجم</label>
                    <select class="form-control" name="size">
                        <option value="big">كبيره</option>
                        <option value="medium">متوسطه</option>
                        <option value="small">صغيره</option>
                    </select>
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
                <form method="post" action="{{route('admin.prices.delete',['id' => $id])}}" class="ajax-form">
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
                        @include('admin.pages.prices.templates.table')
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection