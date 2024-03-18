<?php

namespace App\Http\Requests\Admin;

use App\User;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UserRequest extends FormRequest
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
        if (\Request::route()->getName() == 'admin.users'){
            return [
                'name' => 'required',
                'email' => 'required|unique:users',
                'role' => 'not_in:0',
                'password' => 'required',
                're-password' => 'same:password'
            ];
        }else{
            return [
                'name' => 'required',
                'role' => 'not_in:0',
                'email' => 'required|unique:users,email,'.$this->id
            ];
        }
    }

    public function messages()
    {
        if (\Request::route()->getName() == 'admin.users'){
            return [
                'name.required' => 'برجاء ادخال اسم المستخدم',
                'email.required' => 'برجاء ادخال البريد الالكتروني',
                'email.unique' => 'البريد الالكتروني مستخدم بالفعل',
                'role.not_in' => 'برجاء اختيار صلاحيات المستخدم',
                'password.required' => 'برجاء ادخال الرقم السري',
                're-password.same' => 'الرقم السري غير متطابق'
            ];
        }else{
            return [
                'name.required' => 'برجاء ادخال اسم المستخدم',
                'email.required' => 'برجاء ادخال البريد الالكتروني',
                'email.unique' => 'البريد الالكتروني مستخدم بالفعل',
                'role.not_in' => 'برجاء اختيار صلاحيات المستخدم'
            ];
        }
    }

    public function store(){
        $user= new User();

        $user->name =  $this->name;
        $user->email =  $this->email;
        $user->role =  $this->role;
        $user->password = bcrypt($this->password);

        $user->save();
    }

    public function edit($id)
    {
        $user= User::find($id);

        $user->name =  $this->name;
        $user->email =  $this->email;
        $user->role =  $this->role;
        if ($this->password){
            $user->password = bcrypt($this->password);
        }

        $user->save();
    }
}
