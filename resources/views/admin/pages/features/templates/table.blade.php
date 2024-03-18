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
        <th class="text-center">اسم الميزه</th>
        <th class="text-center">الخيارات</th>
    </tr>
    </thead>
    <tbody>
    @foreach($features as $index => $feature)
        <tr>
            <td>
                <div class="radio-wrap">
                    <input type="checkbox" name="feature_id[]" value="{{$feature->id}}" id="check{{$feature->id}}">
                    <label for="check{{$feature->id}}"></label>
                </div>
            </td>
            <td>{{$index+1}}</td>
            <td>{{$feature->arabic()->title}}</td>
            <td class="text-center">
                <button type="button" data-url="{{route('admin.features.info',['id' => $feature->id])}}" class="btn-modal-view icon-btn green-bc">
                    <i class="fa fa-pencil"></i>
                    تعديل
                </button>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>