<?php

namespace App\Http\Requests\Admin;

use App\PackagePrice;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class PackagePriceRequest extends FormRequest
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
            'price' => 'required|numeric',
            'duration' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'price.required' => 'برجاء ادخال سعر الباقه',
            'price.numeric' => 'السعر يجب ان يكون ارقام ولا يحتوي علي حروف',
            'duration.required' => 'برجاء ادخال مده الباقه',
            'duration.numeric' => 'مده الباقه يجب ان يكون ارقام ولا يحتوي علي حروف',
        ];
    }

    public function store($id)
    {
        $price = new PackagePrice();

        $price->price = $this->price;
        $price->size = $this->size;
        $price->duration = $this->duration;
        $price->package_id = $id;

        $price->save();
    }

    public function edit($id)
    {
        $price = PackagePrice::find($id);

        $price->price = $this->price;
        $price->duration = $this->duration;
        $price->size = $this->size;

        $price->save();
    }
}
