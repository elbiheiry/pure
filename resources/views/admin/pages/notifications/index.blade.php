@extends('admin.layouts.master')
@section('title')
    الاشعارات
@endsection
@section('models')
    <div class="modal fade" id="delete_notification" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content text-center">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">هل تريد حذف هذا الاشعار</h5>
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
                <h2>الاشعارات</h2>
            </div><!--End col-md-6-->
            <div class="col-sm-6">
                <ul class="breadcrumb">
                    <li><a href="{{route('admin.dashboard')}}">الرئيسيه</a></li>
                    <li class="active">الاشعارات</li>
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
                            <th>الرساله</th>
                            <th>المستخدم</th>
                            <th>الشركه</th>
                            <th>البريد الالكتروني</th>
                            <th>رقم الهاتف</th>
                            <th>انشئ في</th>
                            <th>تم رؤيته</th>
                            <th>الخيارات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($notifications as $index => $notification)
                            <tr>
                                @php(
                                    $member = \App\Member::find($notification->member_id)
                                )
                                <td>{{$index+1}}</td>
                                <td>{{$notification->message}}</td>
                                <td>{{$member->first_name}} {{$member->last_name}}</td>
                                <td>{{\App\Company::where('code' , $member->code)->first()->translated()->name}}</td>
                                <td>{{$member->email}}</td>
                                <td>{{$member->phone}}</td>
                                <td>{{$notification->created_at->diffForHumans()}}</td>
                                <td>
                                    @if($notification->seen == 0)
                                        <a href="javascript:;" data-token="{!! csrf_token() !!}" data-url="{{route('admin.notifications.update',['id' => $notification->id])}}" class="Update-Notification icon-btn blue-bc">
                                            <i class="fa fa-eye"></i>
                                            لم يتم
                                        </a>
                                        @else
                                        تمت رؤيته
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if($notification->type == 'note')
                                        <a href="{{route('admin.washes.notes',['id' => $notification->wash_id])}}" class=" icon-btn blue-bc">
                                            <i class="fa fa-info"></i>
                                            مشاهده
                                        </a>
                                    @elseif($notification->type == 'package')
                                        <a href="{{route('admin.members.orders',['id' => $notification->member_id])}}" class="icon-btn blue-bc">
                                            <i class="fa fa-info"></i>
                                            مشاهده
                                        </a>
                                    @elseif($notification->type == 'member')
                                        <a href="{{route('admin.members',['id' => \App\Company::where('code' , $member->code)->value('id')])}}" class="icon-btn blue-bc">
                                            <i class="fa fa-info"></i>
                                            مشاهده
                                        </a>
                                    @else
                                        <a href="{{route('admin.washes.messages',['id' => $notification->wash_id])}}" class="icon-btn blue-bc">
                                            <i class="fa fa-info"></i>
                                            مشاهده
                                        </a>
                                    @endif
                                    <button data-url="{{route('admin.notifications.delete',['id' => $notification->id])}}" data-toggle="modal" data-target="#delete_notification" class="icon-btn red-bc deleteBTN">
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
@section('js')
    <script>
        $('.Update-Notification').on('click' ,function () {
           $.ajax({
               url : $(this).data('url'),
               dataType:'json',
               method: 'POST',
               data: {_token : $(this).data('token')},
               success : function (response) {
                   if (response.status === 'success'){
                       window.location.reload();
                   }
               }
           })
        });
    </script>
@endsection