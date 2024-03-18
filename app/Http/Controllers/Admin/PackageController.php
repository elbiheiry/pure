<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\PackageRequest;
use App\Package;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PackageController extends Controller
{
    //
    public function getIndex($id)
    {
        $packages = Package::where('company_id' , $id)->orderBy('id' , 'DESC')->get();

        return view('admin.pages.packages.index' ,compact('packages' , 'id'));
    }

    public function getInfo($id)
    {
        $package = Package::find($id);

        return view('admin.pages.packages.templates.edit' ,compact('package'));
    }

    public function postIndex(PackageRequest $request , $id)
    {
        $request->store($id);

        $packages = Package::where('company_id' , $id)->orderBy('id' , 'DESC')->get();

        return['status' => 'success' ,'html' => view('admin.pages.packages.templates.table' ,compact('packages'))->render()];
    }

    public function postEdit(PackageRequest $request , $id)
    {
        $request->edit($id);

        $package = Package::find($id);
        $packages = Package::where('company_id' , $package->company_id)->orderBy('id' , 'DESC')->get();

        return['status' => 'success' ,'html' => view('admin.pages.packages.templates.table' ,compact('packages'))->render()];
    }

    public function postDelete(Request $request , $id)
    {
        if ($request->package_id == null){
            return ['status' => 'error' ,'data' => ['يجب ان تقوم باختيار باقه واحده علي الاقل']];
        }else{
            foreach ($request->package_id  as $package_id) {
                $package = Package::find($package_id);
                $package->delete();

            }
            $packages = Package::where('company_id' , $id)->orderBy('id' , 'DESC')->get();

            return ['status' => 'success' ,'html' => view('admin.pages.packages.templates.table' ,compact('packages'))->render()];
        }

    }
}
