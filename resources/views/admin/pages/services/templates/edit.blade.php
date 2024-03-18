<div class="modal-dialog" role="document">
    <div class="modal-content text-center">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">تعديل بيانات الخدمه</h5>
        </div>
        <form class="edit-form" action="{{route('admin.services.edit',['id' => $service->id])}}" method="post" enctype="multipart/form-data">
            <div class="modal-body">
                {!! csrf_field() !!}
                <div class="col-md-8">
                    <div class="col-sm-6 form-group">
                        <label>اسم الخدمه باللغه العربيه</label>
                        <input class="form-control" type="text" value="{{$service->arabic()->title}}" name="title_ar">
                    </div>
                    <div class="col-sm-6 form-group">
                        <label>اسم الخدمه باللغه الانجليزيه</label>
                        <input class="form-control" type="text" value="{{$service->english()->title}}" name="title_en">
                    </div>
                    <div class="col-sm-12 form-group">
                        <label>وصف الخدمه باللغه العربيه</label>
                        <textarea class="form-control" name="description_ar">{{$service->arabic()->description}}</textarea>
                    </div>
                    <div class="col-sm-12 form-group">
                        <label>وصف الخدمه باللغه الانجليزيه</label>
                        <textarea class="form-control" name="description_en">{{$service->english()->description}}</textarea>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="img-block">
                        <img src="{{asset('storage/uploads/services/'.$service->image)}}" class="img-responsive btn-product-image" style="cursor: pointer;">
                        <input type="file" name="image" style="display: none;">
                        <div class="text-danger text-center">برجاء الضغط علي الصوره لتغييرها</div>
                    </div>
                </div>

                <div class="spacer-15"></div>
                <div class="col-sm-12 save-btn">
                    <button class="custom-btn green-bc" type="submit">حفظ</button>
                </div>
        </form>
    </div>
</div>