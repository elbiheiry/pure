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
        <th>اسم المستخدم</th>
        <th>نوع المستخدم</th>
        <th>البريد الالكتروني</th>
        <th class="text-center">الخيارات</th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $index => $user)
        <tr>
            <td>
                <div class="radio-wrap">
                    <input type="checkbox" name="user_id[]" value="{{$user->id}}" id="check{{$user->id}}">
                    <label for="check{{$user->id}}"></label>
                </div>
            </td>
            <td>{{$index+1}}</td>
            <td>{{$user->name}}</td>
            <td>
                @if($user->role == 'admin')
                    ادمن للموقع
                @else
                    مستخدم عادي
                @endif
            </td>
            <td>{{$user->email}}</td>
            <td class="text-center">
                <button type="button" data-url="{{route('admin.users.info',['id' => $user->id])}}" class="btn-modal-view icon-btn green-bc">
                    <i class="fa fa-pencil"></i>
                    تعديل
                </button>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>