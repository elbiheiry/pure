<div class="modal-dialog" role="document">
    <div class="modal-content text-center">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">تعديل الاسعار</h5>
        </div>
        <form class="edit-form" action="{{route('admin.prices.edit',['id' => $price->id])}}" method="post" enctype="multipart/form-data">
            <div class="modal-body">
                {!! csrf_field() !!}

                <div class="col-md-6 form-group">
                    <label>السعر</label>
                    <input class="form-control" type="text" value="{{$price->price}}" name="price">
                </div>

                <div class="col-md-6 form-group">
                    <label>مده الباقه</label>
                    <input class="form-control" type="text" name="duration" value="{{$price->duration}}">
                </div>

                <div class="col-md-6 form-group">
                    <label>الحجم</label>
                    <select class="form-control" name="size">
                        <option value="big" @if($price->size == 'big'){{'selected'}}@endif>كبيره</option>
                        <option value="medium" @if($price->size == 'medium'){{'selected'}}@endif>متوسطه</option>
                        <option value="small" @if($price->size == 'small'){{'selected'}}@endif>صغيره</option>
                    </select>
                </div>
                <div class="spacer-15"></div>
                <div class="col-sm-12 save-btn">
                    <button class="custom-btn green-bc" type="submit">حفظ</button>
                </div>
            </div>
        </form>
    </div>
</div>