<table class="table table-bordered table-hover text-center">
    <thead>
    <tr >
        <th class="text-center">#</th>
        <th class="text-center">العنوان </th>
        <th class="text-center">الخيارات</th>
    </tr>
    </thead>
    <tbody>
    @foreach($whies as $index => $why)
        <tr>
            <td>{{$index+1}}</td>
            <td>{{$why->arabic()->title}}</td>
            <td class="text-center">
                <button type="button" data-url="{{route('admin.why.info',['id' => $why->id])}}" class="btn-modal-view icon-btn green-bc">
                    <i class="fa fa-pencil"></i>
                    تعديل
                </button>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>