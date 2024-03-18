<?php

namespace App\Http\Requests\Admin;

use App\Feature;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Image;

class FeatureRequest extends FormRequest
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
            'image' => \Request::route()->getName() == 'admin.features' ? 'required|image|max:2048' : 'image|max:2048',
            'title_ar' => 'required',
            'title_en' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'image.required' => \Request::route()->getName() == 'admin.features' ? 'برجاء رفع صوره الميزه' : '',
            'image.image' => 'يجب ان تقوم برفع صوره وليس ملف',
            'image.max' => 'اقصي مساحه متاحه للصوره هي 2 ميجابايت',
            'title_ar.required' => 'برجاء ادخال العنوان بالعربيه',
            'title_en.required' => 'برجاء ادخال العنوان بالانجليزيه'
        ];
    }

    public function store()
    {
        $feature = new Feature();

        $this->image->store('features');
        $feature->image = $this->image->hashName();
        Image::make(storage_path('uploads/features/' . $this->image->hashName()))
            ->resize(80,80)
            ->save(storage_path('uploads/features/' . $this->image->hashName()));

        if ($feature->save()){
            $feature->details()->create([
                'title' => $this->title_ar,
                'description' => $this->description_ar,
                'lang' => 'ar'
            ]);

            $feature->details()->create([
                'title' => $this->title_en,
                'description' => $this->description_en,
                'lang' => 'en'
            ]);
        }
    }

    public function edit($id)
    {
        $feature = Feature::find($id);

        if ($this->image) {
            $this->image->store('features');
            $feature->image = $this->image->hashName();
            Image::make(storage_path('uploads/features/' . $this->image->hashName()))
                ->resize(80, 80)
                ->save(storage_path('uploads/features/' . $this->image->hashName()));
        }
        $feature->save();
        $feature->arabic()->update([
            'title' => $this->title_ar,
            'description' => $this->description_ar
        ]);

        $feature->english()->update([
            'title' => $this->title_en,
            'description' => $this->description_en
        ]);
    }
}
