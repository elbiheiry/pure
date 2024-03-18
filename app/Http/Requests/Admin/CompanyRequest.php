<?php

namespace App\Http\Requests\Admin;

use App\Company;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Image;

class CompanyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    protected function failedValidation(Validator $validator)
    {
        $result = ['status' => 'error' ,'data' => $validator->errors()->all()];

        throw new HttpResponseException(response()->json($result , 200));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'logo' => \Request::route()->getName() == 'admin.companies' ? 'required|image|max:2048' : 'image|max:4096',
            'name_ar' => 'required',
            'name_en' => 'required',
            'code' => 'required|unique:companies,code,'.$this->id,
        ];
    }

    public function messages()
    {
        return [
            'logo.required' => \Request::route()->getName() == 'admin.companies' ? 'برجاء رفع صوره الشركه' : '',
            'logo.image' => 'يجب ان تقوم برفع صوره وليس ملف',
            'logo.max' => 'اقصي حجم متاح للصوره هو 4 ميجابايت',
            'name_ar.required' => 'برجاء ادخال اسم الشركه بالغه العربيه',
            'name_en.required' => 'برجاء ادخال اسم الشركه بالغه الانجليزيه',
            'code.required' => 'برجاء ادخال كود الشركه',
            'code.unique' => 'هذا الكود مستخدم بالفعل',
        ];
    }

    public function store()
    {
        $company = new Company();

        $company->code = $this->code;

        $this->logo->store('companies');
        $company->logo = $this->logo->hashName();

        Image::make(storage_path('uploads/companies/' . $this->logo->hashName()))
            ->resize(130,130)
            ->save(storage_path('uploads/companies/' . $this->logo->hashName()));


        if ($company->save()){
            $company->details()->create([
                'name' => $this->name_ar,
                'lang' => 'ar'
            ]);

            $company->details()->create([
                'name' => $this->name_en,
                'lang' => 'en'
            ]);
        }
    }

    public function edit($id)
    {
        $company = Company::find($id);

        $company->code = $this->code;

        if ($this->logo){
            @unlink(storage_path('uploads/companies/')."{$company->logo}");
            $this->logo->store('companies');
            $company->logo = $this->logo->hashName();

            Image::make(storage_path('uploads/companies/' . $this->logo->hashName()))
                ->resize(130,130)
                ->save(storage_path('uploads/companies/' . $this->logo->hashName()));


        }

        $company->save();

        $company->arabic()->update([
            'name' => $this->name_ar
        ]);

        $company->english()->update([
            'name' => $this->name_en
        ]);

    }
}
