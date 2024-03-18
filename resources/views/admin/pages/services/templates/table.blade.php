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
        <th class="text-center">اسم الخدمه</th>
        <th class="text-center">الخيارات</th>
    </tr>
    </thead>
    <tbody>
    @foreach($services as $index => $service)
        <tr>
            <td>
                <div class="radio-wrap">
                    <input type="checkbox" name="service_id[]" value="{{$service->id}}" id="check{{$service->id}}">
                    <label for="check{{$service->id}}"></label>
                </div>
            </td>
            <td>{{$index+1}}</td>
            <td>{{$service->arabic()->title}}</td>
            <td class="text-center">
                <button type="button" data-url="{{route('admin.services.info',['id' => $service->id])}}" class="btn-modal-view icon-btn green-bc">
                    <i class="fa fa-pencil"></i>
                    تعديل
                </button>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>