<?php

namespace App\Http\Requests\Admin;

use App\Home;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class HomeRequest extends FormRequest
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
            'title_ar' => 'required',
            'title_en' => 'required',
            'description_ar' => 'required',
            'description_en' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'title_ar.required' => 'برجاء ادخال عنوان باللغه العربيه',
            'title_en.required' => 'برجاء ادخال عنوان باللغه الانجليزيه',
            'description_ar.required' => 'برجاء ادخال وصف  باللغه العربيه',
            'description_en.required' => 'برجاء ادخال وصف  باللغه الانجليزيه'
        ];
    }

    public function edit()
    {
        $home = Home::first();

        $home->arabic()->update([
            'title' => $this->title_ar,
            'description' => $this->description_ar
        ]);

        $home->english()->update([
            'title' => $this->title_en,
            'description' => $this->description_en
        ]);
    }
}
