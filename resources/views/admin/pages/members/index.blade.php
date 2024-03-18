@extends('admin.layouts.master')
@section('title')
    الاعضاء
@endsection
@section('models')
    <div class="modal fade" id="delete_member" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content text-center">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">هل تريد حذف هذا العضو</h5>
                </div>
                <form class="modal-footer text-center">
                    <a type="button" class="custom-btn red-bc modalDLTBTN">حذف</a>
                    <a type="button" class="custom-btn green-bc" data-dismiss="modal">اغلاق</a>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="content">
        <div class="col-sm-12 page-heading">
            <div class="col-sm-6">
                <h2>الاعضاء</h2>
            </div><!--End col-md-6-->
            <div class="col-sm-6">
                <ul class="breadcrumb">
                    <li><a href="{{route('admin.dashboard')}}">الرئيسيه</a></li>
                    <li class="active">الاعضاء</li>
                </ul>
            </div><!--End col-md-6-->
        </div>
        <div class="spacer-15"></div>
        <div class="widget">
            <div class="widget-content">
                <div class="spacer-15"></div>
                <div class="table-responsive">
                    <table id="datatable"  class="table table-bordered table-hover text-center">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>الاسم الاول</th>
                            <th>الاسم الثاني</th>
                            <th>البريد الالكتروني</th>
                            <th>رقم الهاتف</th>
                            <th>رقم الموقف</th>
                            <th>السياره</th>
                            <th>الموديل</th>
                            <th>اللون</th>
                            <th>رقم اللوحه</th>
                            <th>الشركه</th>
                            <th>الخيارات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($members as $index => $member)
                            <tr>
                                <td>{{$index+1}}</td>
                                <td>{{$member->first_name}}</td>
                                <td> {{$member->last_name}}</td>
                                <td>{{$member->email}}</td>
                                <td>{{$member->phone}}</td>
                                <td>{{$member->park}}</td>
                                <td>{{$member->car->translated()->name}}</td>
                                <td>{{$member->type->translated()->name}}</td>
                                <td>{{$member->color}}</td>
                                <td>{{$member->plate_number}}</td>
                                <td>{{\App\Company::where('code' , $member->code)->first()->translated()->name}}</td>
                                <td class="text-center">
                                    <a href="{{route('admin.members.orders',['id' => $member->id])}}" class="icon-btn blue-bc">
                                        <i class="fa fa-info"></i>
                                        الطلبات
                                    </a>
                                    <button data-url="{{route('admin.members.delete',['id' => $member->id])}}" data-toggle="modal" data-target="#delete_member" class="icon-btn red-bc deleteBTN">
                                        <i class="fa fa-trash-o"></i>
                                        حذف
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection