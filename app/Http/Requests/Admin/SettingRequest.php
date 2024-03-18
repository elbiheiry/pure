<?php

namespace App\Http\Requests\Admin;

use App\Setting;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class SettingRequest extends FormRequest
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
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'address_ar' => 'required',
            'address_en' => 'required',
            'brief_ar' => 'required',
            'brief_en' => 'required',
            'bank_name' => 'required',
            'username' => 'required',
            'iban' => 'required',
            'account_name' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'برجاء ادخال اسم الموقع',
            'phone.required' => 'برجاء ادخال رقم الهاتف',
            'email.required' => 'برجاء ادخال البريد الالكتروني',
            'address_ar.required' => 'برجاء ادخال العنوان باللغه العربيه',
            'address_en.required' => 'برجاء ادخال العنوان باللغه الانجليزيه',
            'brief_ar.required' => 'برجاء ادخال وصف مختصر باللغه العربيه',
            'brief_en.required' => 'برجاء ادخال وصف مختصر باللغه الانجليزيه',
            'bank_name.required' => 'برجاء ادخال اسم البنك',
            'username.required' => 'برجاء ادخال اسم المستخدم بالبنك',
            'iban.required' => 'برجاء ادخال رقم ال iban',
            'account_name.required' => 'برجاء ادخال رقم الحساب'
        ];
    }

    public function edit()
    {
        $settings = Setting::first();

        $settings->name = $this->name;
        $settings->phone = $this->phone;
        $settings->address_ar = $this->address_ar;
        $settings->address_en = $this->address_en;
        $settings->brief_ar = $this->brief_ar;
        $settings->brief_en = $this->brief_en;
        $settings->email = $this->email;
        $settings->facebook = $this->facebook;
        $settings->twitter = $this->twitter;
        $settings->instagram = $this->instagram;
        $settings->youtube = $this->youtube;
        $settings->bank_name = $this->bank_name;
        $settings->username = $this->username;
        $settings->iban = $this->iban;
        $settings->account_name = $this->account_name;

        $settings->save();
    }
}
