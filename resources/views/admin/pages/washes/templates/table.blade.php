<table id="datatable" class="table table-bordered table-hover text-center">
    <thead>
    <tr >
        <th>
            <div class="radio-wrap">
                <input type="checkbox" class="checkall" id="checkall">
                <label for="checkall"></label>
            </div>
        </th>
        <th class="text-center">#</th>
        <th class="text-center">نوع الغسلة</th>
        <th class="text-center">تاريخ الغسلة</th>
        <th class="text-center">حالة الغسلة</th>
        <th class="text-center">ملاحظات</th>
        <th class="text-center">الخيارات</th>
    </tr>
    </thead>
    <tbody>
    @foreach($wishlist->washes as $index => $wash)
        <tr>
            <td>
                <div class="radio-wrap">
                    <input type="checkbox" name="wash_id[]" value="{{$wash->id}}" id="check{{$wash->id}}">
                    <label for="check{{$wash->id}}"></label>
                </div>
            </td>
            <td>{{$index+1}}</td>
            <td>{{$wash->type}}</td>
            <td>{{$wash->date}}</td>
            <td>{{$wash->status}}</td>
            <td>{{$wash->comments}}</td>
            <td class="text-center">
                <a href="{{route('admin.washes.notes',['id' => $wash->id])}}" class="icon-btn blue-bc">
                    <i class="fa fa-info"></i>
                    الملاحظات
                </a>
                <a href="{{route('admin.washes.messages',['id' => $wash->id])}}" class="icon-btn blue-bc">
                    <i class="fa fa-info"></i>
                    الرسائل
                </a>
                <button type="button" data-url="{{route('admin.washes.info',['id' => $wash->id])}}" class="btn-modal-view icon-btn green-bc">
                    <i class="fa fa-pencil"></i>
                    تعديل
                </button>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>