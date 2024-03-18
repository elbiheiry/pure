<table class="table table-bordered table-hover text-center">
    <thead>
    <tr >
        <th>
            <div class="radio-wrap">
                <input type="checkbox" class="checkall" id="checkall">
                <label for="checkall"></label>
            </div>
        </th>
        <th class="text-center">#</th>
        <th class="text-center">اسم الشركه</th>
        <th class="text-center">كود الشركه</th>
        <th class="text-center">الخيارات</th>
    </tr>
    </thead>
    <tbody>
    @foreach($companies as $index => $company)
        <tr>
            <td>
                <div class="radio-wrap">
                    <input type="checkbox" name="company_id[]" value="{{$company->id}}" id="check{{$company->id}}">
                    <label for="check{{$company->id}}"></label>
                </div>
            </td>
            <td>{{$index+1}}</td>
            <td>{{$company->arabic()->name}}</td>
            <td>{{$company->code}}</td>
            <td class="text-center">
                @if(auth()->guard('admins')->user()->role == 'admin')
                    <a href="{{route('admin.packages',['id' => $company->id])}}" class="icon-btn blue-bc">
                        <i class="fa fa-info"></i>
                        الباقات
                    </a>
                    <a href="{{route('admin.members',['id' => $company->id])}}" class="icon-btn blue-bc">
                        <i class="fa fa-users"></i>
                        الاعضاء
                    </a>
                @endif
                <a href="{{route('admin.companies.reports',['code' => $company->code])}}" class="icon-btn blue-bc">
                    <i class="fa fa-users"></i>
                    التقارير
                </a>
                @if(auth()->guard('admins')->user()->role == 'admin')
                    <button type="button" data-url="{{route('admin.companies.info',['id' => $company->id])}}" class="btn-modal-view icon-btn green-bc">
                        <i class="fa fa-pencil"></i>
                        تعديل
                    </button>
                @endif
            </td>
        </tr>
    @endforeach
    </tbody>
</table>