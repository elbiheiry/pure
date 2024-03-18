<div class="modal-dialog" role="document">
    <div class="modal-content text-center">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">تعديل بيانات الميزه</h5>
        </div>
        <form class="edit-form" action="{{route('admin.features.edit',['id' => $feature->id])}}" method="post" enctype="multipart/form-data">
            <div class="modal-body">
                {!! csrf_field() !!}
                <div class="col-md-8">
                    <div class="form-group">
                        <label>اسم الميزه باللغه العربيه</label>
                        <input class="form-control" type="text" value="{{$feature->arabic()->title}}" name="title_ar">
                    </div>
                    <div class="form-group">
                        <label>اسم الميزه باللغه الانجليزيه</label>
                        <input class="form-control" type="text" value="{{$feature->english()->title}}" name="title_en">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="img-block">
                        <img src="{{asset('storage/uploads/features/'.$feature->image)}}" class="img-responsive btn-product-image" style="cursor: pointer;">
                        <input type="file" name="image" style="display: none;">
                        <div class="text-danger text-center">برجاء الضغط علي الصوره لتغييرها</div>
                        <div class="text-danger text-center">مساحه الصوره يجب ان تكون : 80 * 80</div>
                    </div>
                </div>

                <div class="spacer-15"></div>
                <div class="col-sm-12 save-btn">
                    <button class="custom-btn green-bc" type="submit">Save</button>
                </div>
        </form>
    </div>
</div>