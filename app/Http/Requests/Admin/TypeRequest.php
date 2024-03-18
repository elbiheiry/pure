<?php

namespace App\Http\Requests\Admin;

use App\Type;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class TypeRequest extends FormRequest
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
            'name_en' => 'required',
            'name_ar' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name_en.required' => 'برجاء ادخال اسم موديل العربيه باللغه الانجليزيه',
            'name_ar.required' => 'برجاء ادخال اسم موديل العربيه باللغه العربيه'
        ];
    }

    public function store($id)
    {
        $type = new Type();

        $type->car_id = $id;
        $type->size = $this->size;

        if ($type->save()){
            $type->details()->create([
                'name' => $this->name_en,
                'lang' => 'en'
            ]);

            $type->details()->create([
                'name' => $this->name_ar,
                'lang' => 'ar'
            ]);
        }
    }

    public function edit($id)
    {
        $type = Type::find($id);

        $type->size = $this->size;

        $type->save();
        $type->english()->update([
            'name' => $this->name_en
        ]);

        $type->arabic()->update([
            'name' => $this->name_ar
        ]);
    }
}
