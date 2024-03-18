<?php

namespace App\Http\Controllers\Admin;

use App\Company;
use App\Http\Requests\Admin\CompanyRequest;
use App\Member;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CompanyController extends Controller
{
    //
    public function getIndex()
    {
        $companies = Company::orderBy('id' , 'DESC')->get();

        return view('admin.pages.companies.index' ,compact('companies'));
    }

    public function getInfo($id)
    {
        $company = Company::find($id);

        return view('admin.pages.companies.templates.edit' ,compact('company'));
    }

    public function postIndex(CompanyRequest $request)
    {
        $request->store();

        $companies = Company::orderBy('id' , 'DESC')->get();

        return['status' => 'success' ,'html' => view('admin.pages.companies.templates.table' ,compact('companies'))->render()];
    }

    public function postEdit(CompanyRequest $request , $id)
    {
        $request->edit($id);

        $companies = Company::orderBy('id' , 'DESC')->get();

        return['status' => 'success' ,'html' => view('admin.pages.companies.templates.table' ,compact('companies'))->render()];
    }

    public function postDelete(Request $request)
    {
        if ($request->company_id == null){
            return ['status' => 'error' ,'data' => ['يجب ان تقوم باختيار شركه واحده علي الاقل']];
        }else{
            foreach ($request->company_id  as $id) {
                $company = Company::find($id);
                $members = Member::where('code' , $company->code)->get();

                foreach ($members as $member){
                    $member->memberNotifications()->delete();
                    foreach ($member->wishlists as $wishlist) {
                        $wishlist->washes()->delete();
                        $wishlist->delete();
                    }

                    $member->delete();
                }

                foreach ($company->packages as $package) {
                    $package->details()->delete();
                    $package->prices()->delete();

                    $package->delete();
                }

                $company->details()->delete();
                $company->delete();

            }
            $companies = Company::orderBy('id' , 'DESC')->get();

            return ['status' => 'success' ,'html' => view('admin.pages.companies.templates.table' ,compact('companies'))->render()];
        }

    }
    
    public function getReport($code)
    {
        $members = Member::where('code' , $code)->get();

        return view('admin.pages.companies.reports' ,compact('members'));
    }
}
