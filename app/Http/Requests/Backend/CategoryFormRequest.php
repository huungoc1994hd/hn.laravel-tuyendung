<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class CategoryFormRequest extends FormRequest
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
            'name' => 'unique:categories,name,' . $this->id,
        ];
    }

    /**
     * Get the validation message rules that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.unique' => 'Tên danh mục này đã tồn tại.',
        ];
    }
}
