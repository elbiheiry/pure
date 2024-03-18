@extends('admin.layouts.master')
@section('title')
    المستخدمين
@endsection
@section('models')
    <div id="common-modal" class="modal fade" role="dialog">

    </div>
@endsection
@section('content')
    <div class="content">
        <div class="col-sm-12 page-heading">
            <div class="col-sm-6">
                <h2>المستخدمين</h2>
            </div><!--End col-md-6-->
            <div class="col-sm-6">
                <ul class="breadcrumb">
                    <li><a href="{{route('admin.dashboard')}}">الرئيسيه</a></li>
                    <li class="active">المستخدمين</li>
                </ul>
            </div><!--End col-md-6-->
        </div>
        <div class="spacer-15"></div>
        <div class="widget">
            <form class="widget-content ajax-form" action="{{route('admin.users')}}" method="post" enctype="multipart/form-data">
                {!! csrf_field() !!}
                <div class="spacer-15"></div>
                <div class="col-md-6 form-group">
                    <label>اسم المستخدم</label>
                    <input class="form-control" placeholder="اسم المستخدم" type="text" name="name">
                </div>
                <div class="col-md-6 form-group">
                    <label>البريد الالكتروني</label>
                    <input class="form-control" placeholder="البريد الالكتروني" type="email" name="email">
                </div>
                <div class="col-md-6 form-group">
                    <label>نوع المستخدم</label>
                    <select class="form-control" name="role">
                        <option value="0">اختر نوع المستخدم</option>
                        <option value="admin">ادمن للموقع</option>
                        <option value="user">مستخدم عادي</option>
                    </select>
                </div>
                <div class="col-md-6 form-group">
                    <label>الرقم السري</label>
                    <input class="form-control" placeholder="الرقم السري" type="password" name="password">
                </div>
                <div class="col-md-6 form-group">
                    <label>تاكيد الرقم السري</label>
                    <input class="form-control" placeholder="تاكيد الرقم السري" name="re-password" type="password">
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
                <form method="post" action="{{route('admin.users.delete')}}" class="ajax-form">
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
                        @include('admin.pages.users.templates.table')
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection