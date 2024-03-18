<?php

namespace App\Http\Requests\Admin;

use App\Car;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CarRequest extends FormRequest
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
            'name_en.required' => 'برجاء ادخال اسم السياره باللغه الانجليزيه',
            'name_ar.required' => 'برجاء ادخال اسم السياره بالغه العربيه'
        ];
    }

    public function store()
    {
        $car = new Car();

        if ($car->save()){
            $car->details()->create([
                'name' => $this->name_en,
                'lang' => 'en'
            ]);

            $car->details()->create([
                'name' => $this->name_ar,
                'lang' => 'ar'
            ]);
        }
    }

    public function edit($id)
    {
        $car = Car::find($id);

        $car->english()->update([
            'name' => $this->name_en
        ]);

        $car->arabic()->update([
            'name' => $this->name_ar
        ]);
    }
}
