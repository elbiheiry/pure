<?php

namespace App\Http\Requests\Admin;

use App\Why;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class WhyRequest extends FormRequest
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
            'title_ar.required' => 'برجاء ادخال العنوان باللغه العربيه',
            'title_en.required' => 'برجاء ادخال العنوان باللغه الانجليزيه',
            'description_ar.required' => 'برجاء ادخال الوصف باللغه العربيه',
            'description_en.required' => 'برجاء ادخال الوصف باللغه الانجليزيه',
        ];
    }

    public function edit($id)
    {
        $why = Why::find($id);

        if ($this->image){
            @unlink(storage_path('uploads/why/')."{$why->image}");
            $this->image->store('why');
            $why->image = $this->image->hashName();
        }

        $why->save();

        $why->arabic()->update([
            'title' => $this->title_ar,
            'description' => $this->description_ar
        ]);

        $why->english()->update([
            'title' => $this->title_en,
            'description' => $this->description_en
        ]);
    }
}
