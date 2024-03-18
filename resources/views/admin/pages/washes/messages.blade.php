@extends('admin.layouts.master')
@section('title')
    الرسائل
@endsection
@section('content')
    <div class="content">
        <div class="col-sm-12 page-heading">
            <div class="col-sm-6">
                <h2>الرسائل</h2>
            </div><!--End col-md-6-->
            <div class="col-sm-6">
                <ul class="breadcrumb">
                    <li><a href="{{route('admin.dashboard')}}">الرئيسيه</a></li>
                    <li class="active">الرسائل</li>
                </ul>
            </div><!--End col-md-6-->
        </div>
        <div class="spacer-15"></div>
        <div class="widget">
            <div class="widget-content">
                <div class="spacer-15"></div>
                <div class="table-responsive">
                    <table id=""  class="table table-bordered table-hover text-center">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>العنوان</th>
                            <th>الرساله</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($messages as $index => $message)
                            <tr>
                                <td>{{$index+1}}</td>
                                <td>{{$message->subject}}</td>
                                <td>{{$message->message}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection