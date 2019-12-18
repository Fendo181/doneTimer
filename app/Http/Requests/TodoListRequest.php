<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TodoListRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // 認証処理は必要ない為
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
            'category' => 'required',
            'description' => 'required|max:255',
        ];
    }
}
