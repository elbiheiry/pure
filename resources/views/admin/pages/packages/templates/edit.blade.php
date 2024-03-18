<div class="modal-dialog" role="document">
    <div class="modal-content text-center">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">تعديل بيانات الباقه</h5>
        </div>
        <form class="edit-form" action="{{route('admin.packages.edit',['id' => $package->id])}}" method="post" enctype="multipart/form-data">
            <div class="modal-body">
                {!! csrf_field() !!}

                <div class="form-group">
                    <label>اسم الباقه باللغه العربيه</label>
                    <input class="form-control" type="text" value="{{$package->arabic()->name}}" name="name_ar">
                </div>
                <div class="form-group">
                    <label>اسم الباقه باللغه الانجليزيه</label>
                    <input class="form-control" type="text" value="{{$package->english()->name}}" name="name_en">
                </div>
                <div class="form-group">
                    <label>وصف الباقه بالعربيه</label>
                    <textarea class="form-control" name="description_ar">{{$package->arabic()->description}}</textarea>
                </div>
                <div class="form-group">
                    <label>وصف الباقه بالانجليزيه</label>
                    <textarea class="form-control" name="description_en">{{$package->english()->description}}</textarea>
                </div>
                <div class="col-md-6 form-group">
                    <label>عدد الغسلات الخارجيه</label>
                    <input type="number" class="form-control" name="inside" value="{{$package->inside}}">
                </div>
                <div class="col-md-6 form-group">
                    <label>عدد الغسلات الخارجيه الداخليه</label>
                    <input type="number" class="form-control" name="outside" value="{{$package->outside}}">
                </div>
                <div class="col-md-6 form-group">
                    <label>اللون</label>
                    <select class="form-control" name="color">
                        <option value="none" @if($package->color == 'none'){{'selected'}}@endif>زرقاء</option>
                        <option value="gold" @if($package->color == 'gold'){{'selected'}}@endif>ذهبيه</option>
                        <option value="silver" @if($package->color == 'silver'){{'selected'}}@endif>فضيه</option>
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