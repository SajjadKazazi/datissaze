<?php

namespace App\Http\Requests\Staff\Category;

use Illuminate\Foundation\Http\FormRequest;

class AddStaffCategoryRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'slug'=> 'required|unique:staff_categories,slug',
            'description' => 'required',
        ];
    }

    public function validateResolved()
    {
        // TODO: Implement validateResolved() method.
    }
}
