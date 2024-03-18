<?php

namespace App\Http\Controllers\Admin;

use App\Car;
use App\Http\Requests\Admin\CarRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CarController extends Controller
{
    public function getIndex()
    {
        $cars = Car::orderBy('id' , 'DESC')->get();

        return view('admin.pages.cars.index' ,compact('cars'));
    }

    public function getInfo($id)
    {
        $car = Car::find($id);

        return view('admin.pages.cars.templates.edit' ,compact('car'));
    }

    public function postIndex(CarRequest $request)
    {
        $request->store();

        $cars = Car::orderBy('id' , 'DESC')->get();

        return['status' => 'success' ,'html' => view('admin.pages.cars.templates.table' ,compact('cars'))->render()];
    }

    public function postEdit(CarRequest $request , $id)
    {
        $request->edit($id);

        $cars = Car::orderBy('id' , 'DESC')->get();

        return['status' => 'success' ,'html' => view('admin.pages.cars.templates.table' ,compact('cars'))->render()];
    }

    public function postDelete(Request $request)
    {
        if ($request->car_id == null){
            return ['status' => 'error' ,'data' => ['يجب ان تقوم باختيار سياره واحده علي الاقل']];
        }else{
            foreach ($request->car_id  as $id) {
                $car = Car::find($id);

                foreach ($car->types as $type) {

                    $type->details()->delete();

                    foreach ($type->sizes as $size) {

                        $size->details()->delete();

                        $size->delete();

                    }

                    $type->delete();

                }

                $car->delete();

            }
            $cars = Car::orderBy('id' , 'DESC')->get();

            return ['status' => 'success' ,'html' => view('admin.pages.cars.templates.table' ,compact('cars'))->render()];
        }

    }
}
