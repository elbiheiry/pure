<div class="modal-dialog" role="document">
    <div class="modal-content text-center">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">تعديل بيانات السياره</h5>
        </div>
        <form class="edit-form" action="{{route('admin.users.edit',['id' => $user->id])}}" method="post" enctype="multipart/form-data">
            <div class="modal-body">
                {!! csrf_field() !!}

                <div class="col-md-12 form-group">
                    <label>الاسم</label>
                    <input class="form-control" placeholder="user name" value="{{$user->name}}" name="name" type="text">
                </div>
                <div class="col-md-6 form-group">
                    <label>البريد الاكتروني</label>
                    <input class="form-control" placeholder="Email Address" value="{{$user->email}}" name="email" type="email">
                </div>
                <div class="col-md-6 form-group">
                    <label>نوع المستخدم</label>
                    <select class="form-control" name="role">
                        <option value="0">اختر نوع المستخدم</option>
                        <option value="admin" @if($user->role == 'admin'){{'selected'}}@endif>ادمن للموقع</option>
                        <option value="user" @if($user->role == 'user'){{'selected'}}@endif>مستخدم عادي</option>
                    </select>
                </div>
                <div class="col-md-6 form-group">
                    <label>الرقم السري</label>
                    <input class="form-control" placeholder="password" name="password" type="password">
                </div>
                <div class="spacer-15"></div>
                <div class="col-sm-12 save-btn">
                    <button class="custom-btn green-bc" type="submit">حفظ</button>
                </div>
            </div>
        </form>
    </div>
</div>