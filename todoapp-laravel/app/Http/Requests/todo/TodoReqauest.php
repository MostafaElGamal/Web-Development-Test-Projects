<?php

namespace App\Http\Requests\todo;

use Illuminate\Foundation\Http\FormRequest;

class TodoReqauest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'required',
            'descrption' => 'required'
        ];
    }
}
