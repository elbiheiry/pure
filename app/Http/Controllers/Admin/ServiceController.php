<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\ServiceRequest;
use App\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    //
    public function getIndex()
    {
        $services = Service::orderBy('id' , 'DESC')->get();

        return view('admin.pages.services.index' ,compact('services'));
    }

    public function getInfo($id)
    {
        $service = Service::find($id);

        return view('admin.pages.services.templates.edit' ,compact('service'));
    }

    public function postIndex(ServiceRequest $request)
    {
        $request->store();

        $services = Service::orderBy('id' , 'DESC')->get();

        return['status' => 'success' ,'html' => view('admin.pages.services.templates.table' ,compact('services'))->render()];
    }

    public function postEdit(ServiceRequest $request , $id)
    {
        $request->edit($id);

        $services = Service::orderBy('id' , 'DESC')->get();

        return['status' => 'success' ,'html' => view('admin.pages.services.templates.table' ,compact('services'))->render()];
    }

    public function postDelete(Request $request)
    {
        if ($request->service_id == null){
            return ['status' => 'error' ,'data' => ['يجب ان تقوم باختيار خدمه واحده علي الاقل']];
        }else{
            foreach ($request->service_id  as $id) {
                $service = Service::find($id);
                @unlink(storage_path('uploads/services') . "/{$service->image}");
                $service->delete();

            }
            $services = service::orderBy('id' , 'DESC')->get();

            return ['status' => 'success' ,'html' => view('admin.pages.services.templates.table' ,compact('services'))->render()];
        }

    }
}
