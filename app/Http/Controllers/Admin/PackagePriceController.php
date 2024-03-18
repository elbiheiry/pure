<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\PackagePriceRequest;
use App\PackagePrice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PackagePriceController extends Controller
{
    //
    public function getIndex($id)
    {
        $prices = PackagePrice::where('package_id' , $id)->orderBy('id' , 'DESC')->get();

        return view('admin.pages.prices.index' ,compact('prices' , 'id'));
    }

    public function getInfo($id)
    {
        $price = PackagePrice::find($id);

        return view('admin.pages.prices.templates.edit' ,compact('price'));
    }

    public function postIndex(PackagePriceRequest $request , $id)
    {
        $request->store($id);

        $prices = PackagePrice::where('package_id' , $id)->orderBy('id' , 'DESC')->get();

        return['status' => 'success' ,'html' => view('admin.pages.prices.templates.table' ,compact('prices'))->render()];
    }

    public function postEdit(PackagePriceRequest $request , $id)
    {
        $request->edit($id);

        $price = PackagePrice::find($id);
        $prices = PackagePrice::where('package_id' , $price->package_id)->orderBy('id' , 'DESC')->get();

        return['status' => 'success' ,'html' => view('admin.pages.prices.templates.table' ,compact('prices'))->render()];
    }

    public function postDelete(Request $request , $id)
    {
        if ($request->price_id == null){
            return ['status' => 'error' ,'data' => ['يجب ان تقوم باختيار عنصر واحد علي الاقل']];
        }else{
            foreach ($request->price_id  as $price_id) {
                $price = PackagePrice::find($price_id);
                $price->delete();

            }
            $prices = PackagePrice::where('package_id' , $id)->orderBy('id' , 'DESC')->get();

            return ['status' => 'success' ,'html' => view('admin.pages.prices.templates.table' ,compact('prices'))->render()];
        }

    }
}
