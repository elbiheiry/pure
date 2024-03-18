<div class="modal-dialog" role="document">
    <div class="modal-content text-center">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">تعديل بيانات الموديل</h5>
        </div>
        <form class="edit-form" action="{{route('admin.types.edit',['id' => $type->id])}}" method="post" enctype="multipart/form-data">
            <div class="modal-body">
                {!! csrf_field() !!}

                <div class="form-group">
                    <label>الموديل باللغه العرييه</label>
                    <input class="form-control" type="text" value="{{$type->arabic()->name}}" name="name_ar">
                </div>
                <div class="form-group">
                    <label>الموديل باللغه الانجليزيه</label>
                    <input class="form-control" type="text" value="{{$type->english()->name}}" name="name_en">
                </div>
                <div class="form-group">
                    <label>حجم السياره</label>
                    <select class="form-control" name="size">
                        <option value="big" @if($type->size == 'big'){{'selected'}}@endif>كبيره</option>
                        <option value="medium" @if($type->size == 'medium'){{'selected'}}@endif>متوسطه</option>
                        <option value="small" @if($type->size == 'small'){{'selected'}}@endif>صغيره</option>
                    </select>
                </div>

                <div class="spacer-15"></div>
                <div class="col-sm-12 save-btn">
                    <button class="custom-btn green-bc" type="submit">حفظ</button>
                </div>
        </form>
    </div>
</div>