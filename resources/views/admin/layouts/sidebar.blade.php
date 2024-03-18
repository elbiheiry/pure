<div class="side-menu">
    <div class="logo">
        <div class="main-logo"><img src="{{asset('assets/admin/images/logo.png')}}"></div>
    </div><!--End Logo-->
    <aside class="sidebar">
        <ul class="side-menu-links">
            @if(auth()->guard('admins')->user()->role == 'admin')
                <li class="@if(Request::route()->getName() == 'admin.dashboard'){{'active'}}@endif"><a href="{{route('admin.dashboard')}}">الرئيسيه</a></li>
                <li class="@if(Request::route()->getName() == 'admin.settings'){{'active'}}@endif"><a href="{{route('admin.settings')}}">اعدادات الموقع</a></li>
                <li class="@if(Request::route()->getName() == 'admin.about'){{'active'}}@endif"><a href="{{route('admin.about')}}">من نحن</a></li>
                <li class="@if(Request::route()->getName() == 'admin.why'){{'active'}}@endif"><a href="{{route('admin.why')}}">لماذا بيور ووش</a></li>
                <li class="@if(Request::route()->getName() == 'admin.services'){{'active'}}@endif"><a href="{{route('admin.services')}}">الخدمات</a></li>
                <li class="@if(Request::route()->getName() == 'admin.cars'){{'active'}}@endif"><a href="{{route('admin.cars')}}">السيارات</a></li>
            @endif
            <li class="@if(Request::route()->getName() == 'admin.companies'){{'active'}}@endif"><a href="{{route('admin.companies')}}">الشركات</a></li>
            <li class="@if(Request::route()->getName() == 'admin.reports'){{'active'}}@endif"><a href="{{route('admin.reports')}}"> التقارير</a></li>
            @if(auth()->guard('admins')->user()->role == 'admin')
                <li class="notification-counter @if(Request::route()->getName() == 'admin.notifications'){{'active'}}@endif"><a href="{{route('admin.notifications')}}"> الاشعارات<span>{{\App\Notification::where('seen' ,'0')->count()}}</span></a></li>
                <li class="@if(Request::route()->getName() == 'admin.contact'){{'active'}}@endif"><a href="{{route('admin.contact')}}">الرسائل</a></li>
                <li class="@if(Request::route()->getName() == 'admin.subscribers'){{'active'}}@endif"><a href="{{route('admin.subscribers')}}">المشتركين</a></li>
                <li class="@if(Request::route()->getName() == 'admin.users'){{'active'}}@endif"><a href="{{route('admin.users')}}">المستخدمين</a></li>
            @endif
        </ul>
    </aside>
</div>