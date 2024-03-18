<?php

namespace App\Http\Controllers\Admin;

use App\Car;
use App\Http\Requests\Admin\TypeRequest;
use App\Type;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TypeController extends Controller
{
    public function getIndex($id)
    {
        $car = Car::find($id);

        return view('admin.pages.types.index' ,compact('car'));
    }

    public function getInfo($id)
    {
        $type = Type::find($id);

        $car = Car::find($type->car_id);

        return view('admin.pages.types.templates.edit' ,compact('type','car'));
    }

    public function postIndex(TypeRequest $request , $id)
    {
        $request->store($id);

        $car = Car::find($id);

        return['status' => 'success' ,'html' => view('admin.pages.types.templates.table' ,compact('car'))->render()];
    }

    public function postEdit(TypeRequest $request , $id)
    {
        $request->edit($id);

        $type = Type::find($id);
        $car = Car::find($type->car_id);

        return['status' => 'success' ,'html' => view('admin.pages.types.templates.table' ,compact('car'))->render()];
    }

    public function postDelete(Request $request , $id)
    {
        if ($request->type_id == null){
            return ['status' => 'error' ,'data' => ['يجب ان تقوم باختيار موديل واحد علي الاقل']];
        }else{
            foreach ($request->type_id  as $type_id) {
                $type = Type::find($type_id);

                foreach ($type->sizes as $size) {
                    $size->details()->delete();
                    $size->delete();
                }
                $type->delete();

            }
            $car = Car::find($id);

            return ['status' => 'success' ,'html' => view('admin.pages.types.templates.table' ,compact('car'))->render()];
        }

    }
}
