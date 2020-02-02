<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreKeyToolRequest extends FormRequest
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
            'key' =>  'required|unique:tool_key_lists,key',
            'machine_name' => 'required',
            'user_id' => 'required',
            'is_active' => 'required',
            'expired_at' => 'required',
        ];
    }
}
