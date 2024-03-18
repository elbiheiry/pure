<option value="0">اختر موديل السياره</option>
@foreach($models as $model)
    <option value="{{$model->id}}">{{$model->arabic()->name}}</option>
@endforeach