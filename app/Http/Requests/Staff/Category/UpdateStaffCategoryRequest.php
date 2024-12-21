<?php

namespace App\Http\Requests\Staff\Category;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateStaffCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
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
            'slug'=> ['required' , Rule::unique('staff_categories','slug')->ignore($this->id)],
            'description' => 'required',

        ];
    }

    public function validateResolved()
    {
        // TODO: Implement validateResolved() method.
    }
}
