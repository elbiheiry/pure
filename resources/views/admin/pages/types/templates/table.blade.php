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
        <th class="text-center">موديل السياره</th>
        <th class="text-center">الخيارات</th>
    </tr>
    </thead>
    <tbody>
    @foreach($car->types as $index => $type)
        <tr>
            <td>
                <div class="radio-wrap">
                    <input type="checkbox" name="type_id[]" value="{{$type->id}}" id="check{{$type->id}}">
                    <label for="check{{$type->id}}"></label>
                </div>
            </td>
            <td>{{$index+1}}</td>
            <td>{{$type->arabic()->name}}</td>
            <td class="text-center">
                <button type="button" data-url="{{route('admin.types.info',['id' => $type->id])}}" class="btn-modal-view icon-btn green-bc">
                    <i class="fa fa-pencil"></i>
                    تعديل
                </button>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>