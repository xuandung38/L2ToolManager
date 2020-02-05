<?php

namespace App\Http\Requests;

use App\Http\Requests\Api\ApiBaseRequest;
use Illuminate\Foundation\Http\FormRequest;

class UpdateAccountAPI extends ApiBaseRequest
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
            'name' =>  'required',
            'server' =>  'required|numeric',
            'planet' =>  'required|string',
            'power' =>  'required|numeric',
            'gem' =>  'required|numeric',
            'missions' =>  'required|string',
            'map' =>  'required|string',
            'login_at' =>  'required',
            'status' =>  'required|numeric',
        ];
    }
}
