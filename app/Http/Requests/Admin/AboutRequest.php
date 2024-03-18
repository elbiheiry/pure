<?php

namespace App\Http\Requests\Admin;

use App\About;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Image;

class AboutRequest extends FormRequest
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
            'image' => $this->image ? 'image|max:2048' : '',
            'title_ar' => 'required',
            'title_en' => 'required',
            'description_ar' => 'required',
            'description_en' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'image.image' => $this->image ? 'برجاء رفع الصور' : '',
            'image.max' => $this->image ? 'اقصي حجم متاح للصوره هو 2 ميجابايت' : '',
            'title_ar.required' => 'برجاء ادخال عنوان باللغه العربيه',
            'title_en.required' => 'برجاء ادخال عنوان باللغه الانجليزيه',
            'description_ar.required' => 'برجاء ادخال وصف  باللغه العربيه',
            'description_en.required' => 'برجاء ادخال وصف  باللغه الانجليزيه'
        ];
    }

    public function edit($id)
    {
        $about = About::find($id);

        if ($this->image){
            @unlink(storage_path('uploads/about')."{$about->image}");
            $this->image->store('about');
            $about->image = $this->image->hashName();
        }

        $about->save();

        $about->arabic()->update([
            'title' => $this->title_ar,
            'description' => $this->description_ar
        ]);

        $about->english()->update([
            'title' => $this->title_en,
            'description' => $this->description_en
        ]);
    }
}
