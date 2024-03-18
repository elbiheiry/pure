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
        <th class="text-center">اسم الباقه</th>
        <th class="text-center">الخيارات</th>
    </tr>
    </thead>
    <tbody>
    @foreach($packages as $index => $package)
        <tr>
            <td>
                <div class="radio-wrap">
                    <input type="checkbox" name="package_id[]" value="{{$package->id}}" id="check{{$package->id}}">
                    <label for="check{{$package->id}}"></label>
                </div>
            </td>
            <td>{{$index+1}}</td>
            <td>{{$package->arabic()->name}}</td>
            <td class="text-center">
                <a href="{{route('admin.prices',['id' => $package->id])}}" class="icon-btn blue-bc">
                    <i class="fa fa-dollar"></i>
                    الاسعار
                </a>
                <button type="button" data-url="{{route('admin.packages.info',['id' => $package->id])}}" class="btn-modal-view icon-btn green-bc">
                    <i class="fa fa-pencil"></i>
                    تعديل
                </button>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

