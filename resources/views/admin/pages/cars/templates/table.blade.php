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
        <th class="text-center">اسم السياره</th>
        <th class="text-center">الخيارات</th>
    </tr>
    </thead>
    <tbody>
    @foreach($cars as $index => $car)
        <tr>
            <td>
                <div class="radio-wrap">
                    <input type="checkbox" name="car_id[]" value="{{$car->id}}" id="check{{$car->id}}">
                    <label for="check{{$car->id}}"></label>
                </div>
            </td>
            <td>{{$index+1}}</td>
            <td>{{$car->arabic()->name}}</td>
            <td class="text-center">
                <a href="{{route('admin.types',['id' => $car->id])}}" class="icon-btn blue-bc">
                    <i class="fa fa-info-circle"></i>
                    الانواع
                </a>
                <button type="button" data-url="{{route('admin.cars.info',['id' => $car->id])}}" class="btn-modal-view icon-btn green-bc">
                    <i class="fa fa-pencil"></i>
                    تعديل
                </button>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>