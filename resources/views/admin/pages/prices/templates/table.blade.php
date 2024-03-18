<table class="table table-bordered table-hover text-center">
    <thead>
    <tr >
        <th>
            <div class="radio-wrap">
                <input type="checkbox" class="checkall" id="checkall">
                <label for="checkall"></label>
            </div>
        </th>
        <th class="text-center">#</th>
        <th class="text-center">السعر </th>
        <th class="text-center">الحجم </th>
        <th class="text-center">المده </th>
        <th class="text-center">الخيارات</th>
    </tr>
    </thead>
    <tbody>
    @foreach($prices as $index => $price)
        <tr>
            <td>
                <div class="radio-wrap">
                    <input type="checkbox" name="price_id[]" value="{{$price->id}}" id="check{{$price->id}}">
                    <label for="check{{$price->id}}"></label>
                </div>
            </td>
            <td>{{$index+1}}</td>
            <td>{{$price->price}}</td>
            <td>{{$price->size}}</td>
            <td>{{$price->duration}} - شهر</td>
            <td class="text-center">
                <button type="button" data-url="{{route('admin.prices.info',['id' => $price->id])}}" class="btn-modal-view icon-btn green-bc">
                    <i class="fa fa-pencil"></i>
                    تعديل
                </button>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>