@extends('admin.layouts.master')
@section('title')
    الغسلات
@endsection
@section('models')
    <div id="common-modal" class="modal fade" role="dialog">

    </div>
@endsection
@section('content')
    <div class="content">
        <div class="col-sm-12 page-heading">
            <div class="col-sm-6">
                <h2>الغسلات</h2>
            </div><!--End col-md-6-->
            <div class="col-sm-6">
                <ul class="breadcrumb">
                    <li><a href="{{route('admin.dashboard')}}">الرئيسيه</a></li>
                    <li class="active">الغسلات</li>
                </ul>
            </div><!--End col-md-6-->
        </div>
        <div class="spacer-15"></div>
        <div class="widget">
            <form class="widget-content ajax-form" action="{{route('admin.washes',['id' => $wishlist->id])}}" method="post" enctype="multipart/form-data">
                {!! csrf_field() !!}
                <div class="spacer-15"></div>
                <div class="col-sm-6 form-group">
                    <label>نوع الغسله</label>
                    <select class="form-control" name="type">
                        <option value="داخلي">داخلي</option>
                        <option value="خارجي">خارجي</option>
                        <option value="خارجي داخلي">خارجي داخلي</option>
                    </select>
                </div>
                <div class="col-sm-6 form-group">
                    <label>تاريخ الغسله</label>
                    <input class="form-control" type="date" name="date">
                </div>
                <div class="col-sm-6 form-group">
                    <label>حاله الغسله</label>
                    <select class="form-control" name="status">
                        <option value="تحت التنفيذ" >تحت التنفيذ</option>
                        <option value="تم الغسل" >تم الغسل</option>
                        <option value="تم التاجيل" >تم التاجيل</option>
                        <option value="تم الالغاء" >تم الالغاء</option>
                    </select>
                </div>
                <div class="col-sm-6 form-group">
                    <label>الملاحظات</label>
                    <input class="form-control" type="text" name="comments">
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
                <form method="post" action="{{route('admin.washes.delete',['id' => $wishlist->id])}}" class="ajax-form">
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
                        @include('admin.pages.washes.templates.table')
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection