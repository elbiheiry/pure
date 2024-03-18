<div class="modal-dialog" role="document">
    <div class="modal-content text-center">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">تعديل بيانات الشركه</h5>
        </div>
        <form class="edit-form" action="{{route('admin.companies.edit',['id' => $company->id])}}" method="post" enctype="multipart/form-data">
            <div class="modal-body">
                {!! csrf_field() !!}
                <div class="col-md-6 form-group ">
                    <label>صوره الشركه</label>
                    <img src="{{asset('storage/uploads/companies/'.$company->logo)}}" class="img-responsive btn-product-image" style="cursor: pointer;">
                    <input type="file" name="logo" style="display: none;">
                    <div class="text-danger text-center">برجاء الضغط علي الصوره لتغييرها</div>
                    <div class="text-danger text-center">مساحه الصوره يجب ان تكون: 130 * 130</div>
                </div>
                <div class="form-group">
                    <label>اسم الشركه باللغه العربيه</label>
                    <input class="form-control" type="text" value="{{$company->arabic()->name}}" name="name_ar">
                </div>
                <div class="form-group">
                    <label>اسم الشركه بالغه الانجليزيه</label>
                    <input class="form-control" type="text" value="{{$company->english()->name}}" name="name_en">
                </div>

                <div class="spacer-15"></div>
                <div class="col-sm-12 save-btn">
                    <button class="custom-btn green-bc" type="submit">Save</button>
                </div>
        </form>
    </div>
</div>