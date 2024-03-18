<div class="modal-dialog" role="document">
    <div class="modal-content text-center">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">تعديل بيانات السياره</h5>
        </div>
        <form class="edit-form" action="{{route('admin.cars.edit',['id' => $car->id])}}" method="post" enctype="multipart/form-data">
            <div class="modal-body">
                {!! csrf_field() !!}

                <div class="form-group">
                    <label>اسم السياره بالعربيه</label>
                    <input class="form-control" type="text" value="{{$car->arabic()->name}}" name="name_ar">
                </div>
                <div class="form-group">
                    <label>اسم السياره بالانجليزيه</label>
                    <input class="form-control" type="text" value="{{$car->english()->name}}" name="name_en">
                </div>

                <div class="spacer-15"></div>
                <div class="col-sm-12 save-btn">
                    <button class="custom-btn green-bc" type="submit">حفظ</button>
                </div>
        </form>
    </div>
</div>