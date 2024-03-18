@extends('admin.layouts.master')
@section('title')
    الاشتراكات
@endsection
@section('content')
    <div class="content">
        <div class="col-sm-12 page-heading">
            <div class="col-sm-6">
                <h2>الاشتراكات</h2>
            </div><!--End col-md-6-->
            <div class="col-sm-6">
                <ul class="breadcrumb">
                    <li><a href="{{route('admin.dashboard')}}">الرئيسيه</a></li>
                    <li class="active">الاشتراكات</li>
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
                            <th>اسم الباقه</th>
                            <th>سعر الباقه</th>
                            <th>تاريخ الطلب</th>
                            <th>تاريخ الانتهاء</th>
                            <th>طريقه الدفع</th>
                            <th>الحاله</th>
                            <th>الخيارات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($wishlists as $index => $wishlist)
                            <tr>
                            <tr>
                                <td >
                                    {{$index+1}}
                                </td>
                                <td >
                                     {{$wishlist->package->translated()->name}} 
                                </td>
                                <td >
                                     {{$wishlist->package->prices()->where('size' , $size)->where('duration' , $wishlist->price['duration'])->value('price')}} ر.س 
                                </td>
                                <td >
                                     {{$wishlist->created_at->format('d/m/Y')}} 
                                </td>
                                <td >
                                     {{\Carbon\Carbon::parse($wishlist->created_at)->addMonths($wishlist->price['duration'])->format('d/m/Y')}} 
                                </td>
                                <td >
                                     {{$wishlist->payment}} 
                                </td>
                                <td >
                                    <select class="form-control Update-Order" data-token="{!! csrf_token() !!}" data-url="{{route('admin.members.orders.edit',['id' => $wishlist->id])}}" name="status">
                                        <!--<option value="تم الموافقه" @if($wishlist->status == 'تم الموافقه'){{'selected'}}@endif>تمت الموافقه</option>-->
                                        <option value="قيد التنفيذ" @if($wishlist->status == 'قيد التنفيذ'){{'selected'}}@endif>قيد التنفيذ</option>
                                        <option value="تم الرفض" @if($wishlist->status == 'تم الرفض'){{'selected'}}@endif>تم الرفض</option>
                                        <option value="بانتظار التحويل" @if($wishlist->status == 'بانتظار التحويل'){{'selected'}}@endif>بانتظار التحويل</option>
                                        <option value="تم التنفيذ" @if($wishlist->status == 'تم التنفيذ'){{'selected'}}@endif>تم التنفيذ</option>
                                    </select>
                                </td>
                                <td >
                                    <a href="{{route('admin.washes',['id' => $wishlist->id])}}" class="icon-btn green-bc">
                                        <i class="fa fa-info"></i>
                                        الغسلات
                                    </a>

                                    <a href="{{route('admin.members.orders.delete',['id' => $wishlist->id])}}" class="icon-btn red-bc">
                                        <i class="fa fa-trash"></i>
                                        حذف
                                    </a>
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
        $('.Update-Order').on('change' ,function () {
            $.ajax({
                url : $(this).data('url'),
                dataType:'json',
                method: 'POST',
                data: {_token : $(this).data('token') , status : $(this).val()},
                success : function (response) {
                    if (response.status === 'success'){
                        window.location.reload();
                    }
                }
            })
        });
    </script>
@endsection