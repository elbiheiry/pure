<div class="modal-dialog" role="document">
    <div class="modal-content text-center">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">تعديل بيانات الغسله</h5>
        </div>
        <form class="edit-form" action="{{route('admin.washes.edit',['id' => $wash->id])}}" method="post" enctype="multipart/form-data">
            <div class="modal-body">
                {!! csrf_field() !!}

                <div class="form-group">
                    <label>نوع الغسله</label>
                    <div class="col-sm-6 form-group">
                        <label>نوع الغسله</label>
                        <select class="form-control" name="type">
                            <option value="داخلي" @if($wash->type == 'داخلي'){{'selected'}}@endif>داخلي</option>
                            <option value="خارجي" @if($wash->type == 'خارجي'){{'selected'}}@endif>خارجي</option>
                            <option value="خارجي داخلي" @if($wash->type == 'خارجي داخلي'){{'selected'}}@endif>خارجي داخلي</option>
                        </select>
                    </div>
                    <input class="form-control" type="text" value="{{$wash->type}}" name="type">
                </div>
                <div class="form-group">
                    <label>تاريخ الغسله</label>
                    <input class="form-control" type="date" value="{{$wash->date}}" name="date">
                </div>
                <div class="form-group">
                    <label>حاله الغسله</label>
                    <select class="form-control" name="status">
                        <option value="تحت التنفيذ" @if($wash->status == 'تحت التنفيذ'){{'selected'}}@endif>تحت التنفيذ</option>
                        <option value="تم الغسل" @if($wash->status == 'تم الغسل'){{'selected'}}@endif>تم الغسل</option>
                        <option value="تم التاجيل" @if($wash->status == 'تم التاجيل'){{'selected'}}@endif>تم التاجيل</option>
                        <option value="تم الالغاء" @if($wash->status == 'تم الالغاء'){{'selected'}}@endif>تم الالغاء</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>الملاحظات</label>
                    <input class="form-control" type="text" value="{{$wash->comments}}" name="comments">
                </div>
                <div class="spacer-15"></div>
                <div class="col-sm-12 save-btn">
                    <button class="custom-btn green-bc" type="submit">حفظ</button>
                </div>
        </form>
    </div>
</div>