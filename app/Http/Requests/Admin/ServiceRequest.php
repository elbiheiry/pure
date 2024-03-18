<?php

namespace App\Http\Requests\Admin;

use App\Service;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Image;

class ServiceRequest extends FormRequest
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
            'image' => \Request::route()->getName() == 'admin.services' ? 'required|image|max:2048' : 'image|max:2048',
            'title_ar' => 'required',
            'title_en' => 'required',
            'description_ar' => 'required',
            'description_en' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'image.required' => \Request::route()->getName() == 'admin.services' ? 'برجاء رفع صوره الخدمه' : '',
            'image.image' => 'يجب ان تقوم برفع صوره وليس ملف',
            'image.max' => 'اقصي حجم متاح للصوره هو 2 ميجابايت',
            'title_ar.required' => 'برجاء ادخال اسم الخدمه باللغه العربيه',
            'title_en.required' => 'برجاء ادخال اسم الخدمه باللغه الانجليزيه',
            'description_ar.required' => 'برجاء ادخال وصف الخدمه باللغه العربيه',
            'description_en.required' => 'برجاء ادخال وصف الباقه باللغه الانجليزيه',
        ];
    }

    public function store()
    {
        $service = new Service();

        $this->image->store('services');
        $service->image = $this->image->hashName();

        if ($service->save()){
            $service->details()->create([
                'title' => $this->title_en,
                'description' => $this->description_en,
                'lang' => 'en'
            ]);

            $service->details()->create([
                'title' => $this->title_ar,
                'description' => $this->description_ar,
                'lang' => 'ar'
            ]);
        }
    }

    public function edit($id)
    {
        $service = Service::find($id);

        if ($this->image){
            @unlink(storage_path('uploads/services/')."{$service->image}");
            $this->image->store('services');
            $service->image = $this->image->hashName();
        }

        $service->save();

        $service->english()->update([
            'title' => $this->title_en,
            'description' => $this->description_en
        ]);

        $service->arabic()->update([
            'title' => $this->title_ar,
            'description' => $this->description_ar
        ]);
    }
}
