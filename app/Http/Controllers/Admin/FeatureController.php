<?php

namespace App\Http\Controllers\Admin;

use App\Feature;
use App\Http\Requests\Admin\FeatureRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FeatureController extends Controller
{
    //

    public function getIndex()
    {
        $features = Feature::orderBy('id' , 'DESC')->get();

        return view('admin.pages.features.index' ,compact('features'));
    }

    public function getInfo($id)
    {
        $feature = Feature::find($id);

        return view('admin.pages.features.templates.edit' ,compact('feature'));
    }

    public function postIndex(FeatureRequest $request)
    {
        $request->store();

        $features = Feature::orderBy('id' , 'DESC')->get();

        return['status' => 'success' ,'html' => view('admin.pages.features.templates.table' ,compact('features'))->render()];
    }

    public function postEdit(FeatureRequest $request , $id)
    {
        $request->edit($id);

        $features = Feature::orderBy('id' , 'DESC')->get();

        return['status' => 'success' ,'html' => view('admin.pages.features.templates.table' ,compact('features'))->render()];
    }

    public function postDelete(Request $request)
    {
        if ($request->feature_id == null){
            return ['status' => 'error' ,'data' => ['يجب ان تقوم باختيار ميزه واحده علي الاقل']];
        }else{
            foreach ($request->feature_id  as $id) {
                $feature = Feature::find($id);
                @unlink(storage_path('uploads/features') . "/{$feature->image}");
                $feature->delete();

            }
            $features = Feature::orderBy('id' , 'DESC')->get();

            return ['status' => 'success' ,'html' => view('admin.pages.features.templates.table' ,compact('features'))->render()];
        }

    }
}
