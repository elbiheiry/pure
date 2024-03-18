@extends('admin.layouts.master')
@section('title')
    التقارير
@endsection
@section('content')
    <div class="content">
        <div class="col-sm-12 page-heading">
            <div class="col-sm-6">
                <h2>التقارير</h2>
            </div><!--End col-md-6-->
            <div class="col-sm-6">
                <ul class="breadcrumb">
                    <li><a href="{{route('admin.dashboard')}}">الرئيسيه</a></li>
                    <li class="active">التقارير</li>
                </ul>
            </div><!--End col-md-6-->
        </div>
        <div class="spacer-15"></div>
        <div class="widget">
            <form class="widget-content" action="{{route('admin.reports')}}" method="get" >
                {!! csrf_field() !!}
                <div class="col-sm-6 form-group">
                    <label>التاريخ</label>
                    <input class="form-control" type="date" name="date">
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
                <div class="spacer-15"></div>
                <div class="table-responsive">
                    <table id="datatable" class="table table-bordered table-hover text-center">
                        <thead>
                        <tr >
                            <th class="text-center">#</th>
                            <th class="text-center">المستخدم</th>
                            <th class="text-center">البريد الالكتروني</th>
                            <th class="text-center">رقم الهاتف</th>
                            <th class="text-center">رقم الموقف</th>
                            <th class="text-center">السياره</th>
                            <th class="text-center">النوع</th>
                            <th class="text-center">اللون</th>
                            <th class="text-center">سنه التصنيع</th>
                            <th class="text-center">رقم السياره</th>
                            <th class="text-center">الشركه</th>
                            <th class="text-center">نوع الغسلة</th>
                            <th class="text-center">حالة الغسلة</th>
                            <th class="text-center">ملاحظات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($washes as $index => $wash)
                            <tr>
                                <td>{{$index+1}}</td>
                                <td>{{$wash->wishlist->member['first_name']}} {{$wash->wishlist->member['last_name']}}</td>
                                <td>{{$wash->wishlist->member['email']}}</td>
                                <td>{{$wash->wishlist->member['phone']}}</td>
                                <td>{{$wash->wishlist->member['park']}}</td>
                                <td>{{$wash->wishlist->member->car->translated()->name}}</td>
                                <td>{{$wash->wishlist->member->type->translated()->name}}</td>
                                <td>{{$wash->wishlist->member['color']}}</td>
                                <td>{{$wash->wishlist->member['year']}}</td>
                                <td>{{$wash->wishlist->member['plate_number']}}</td>
                                <td>{{$wash->wishlist->member->company()->translated()->name}}</td>
                                <td>{{$wash->type}}</td>
                                <td>{{$wash->status}}</td>
                                <td>{{$wash->comments}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection