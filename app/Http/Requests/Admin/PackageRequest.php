<?php

namespace App\Http\Requests\Admin;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Package;

class PackageRequest extends FormRequest
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
            'name_ar' => 'required',
            'description_en' => 'required',
            'description_ar' => 'required',
            'inside' => 'required',
            'outside' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name_en.required' => 'برجاء ادخال اسم الباقه باللغه الانجليزيه',
            'name_ar.required' => 'برجاء ادخال اسم الباقه باللغه العربيه',
            'description_en.required' => 'برجاء ادخال وصف الباقه باللغه الانجليزيه',
            'description_ar.required' => 'برجاء ادخال وصف الباقه باللغه العربيه',
            'inside.required' => 'برجاء ادخال عدد الغسلات الداخليه',
            'outside.required' => 'برجاء ادخال عدد الغسلات الداخليه والخارجيه'
        ];
    }

    public function store($id)
    {
        $package = new Package();

        $package->company_id = $id;
        $package->inside = $this->inside;
        $package->outside = $this->outside;
        $package->color = $this->color;
        $package->washes = $this->outside + $this->inside;

        if ($package->save()){
            $package->details()->create([
                'name' => $this->name_en,
                'description' => $this->description_en,
                'lang' => 'en'
            ]);

            $package->details()->create([
                'name' => $this->name_ar,
                'description' => $this->description_ar,
                'lang' => 'ar'
            ]);
        }
    }

    public function edit($id)
    {
        $package = Package::find($id);

        $package->inside = $this->inside;
        $package->outside = $this->outside;
        $package->color = $this->color;
        $package->washes = $this->outside + $this->inside;

        $package->save();

        $package->english()->update([
            'name' => $this->name_en,
            'description' => $this->description_en
        ]);

        $package->arabic()->update([
            'name' => $this->name_ar,
            'description' => $this->description_ar
        ]);
    }
}
