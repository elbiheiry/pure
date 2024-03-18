<div class="modal-dialog" role="document">
    <div class="modal-content text-center">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">تعديل البيانات</h5>
        </div>
        <form class="edit-form" action="{{route('admin.about.edit',['id' => $about->id])}}" method="post" enctype="multipart/form-data">
            <div class="modal-body">
                {!! csrf_field() !!}

                @if($about->image != null)
                    <div class="col-sm-6 form-group">
                        <label>الصوره</label>
                        <img src="{{asset('storage/uploads/about/'.$about->image)}}" class="img-responsive btn-product-image" style="cursor: pointer;">
                        <input type="file" name="image" style="display: none;">
                        <div class="text-danger text-center">برجاء الضغط علي الصوره لتغييرها</div>
                    </div>
                @endif
                <div class="clearfix"></div>
                <div class="col-sm-6 form-group">
                    <label>العنوان باللغه العربيه</label>
                    <input class="form-control" type="text" value="{{$about->arabic()->title}}" name="title_ar">
                </div>
                <div class="col-sm-6 form-group">
                    <label>العنوان بالانجليزيه</label>
                    <input class="form-control" type="text" value="{{$about->english()->title}}" name="title_en">
                </div>

                <div class="col-sm-12 form-group">
                    <label>الوصف بالعربيه</label>
                    <textarea class="form-control" name="description_ar">{{$about->arabic()->description}}</textarea>
                </div>
                <div class="col-sm-12 form-group">
                    <label>الوصف بالانجليزيه</label>
                    <textarea class="form-control" name="description_en">{{$about->english()->description}}</textarea>
                </div>
                <div class="spacer-15"></div>
                <div class="col-sm-12 save-btn">
                    <button class="custom-btn green-bc" type="submit">حفظ</button>
                </div>
            </div>
        </form>
    </div>
</div>