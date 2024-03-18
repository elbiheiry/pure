<?php

namespace App\Http\Requests\Admin;

use App\Wash;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class WashRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
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
            'type' => 'required',
            'date' => 'required',
            'status' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'type.required' => 'برجاء ادخال نوع الغسله',
            'date.required' => 'برجاء ادخال تاريخ الغسله',
            'status.required' => 'برجاء ادخال حاله الغسله'
        ];
    }

    public function store($id)
    {
        $wash = new Wash();

        $wash->wishlist_id = $id;
        $wash->date = $this->date;
        $wash->type = $this->type;
        $wash->status = $this->status;
        $wash->comments = $this->comments;

        $wash->save();
    }

    public function edit($id)
    {
        $wash = Wash::find($id);

        $wash->date = $this->date;
        $wash->type = $this->type;
        $wash->status = $this->status;
        $wash->comments = $this->comments;

        $wash->save();
    }
}
