<?php

namespace App\Http\Requests\Page;

use Illuminate\Foundation\Http\FormRequest;

class AddPageRequest extends FormRequest
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
            'body' => 'required',
            'slug'=> 'required|unique:pages,slug',
            'meta_title'=>'required',
            'meta_description'=>'nullable',
            'meta_canonical'=>'nullable',

        ];
    }

    public function validateResolved()
    {
        // TODO: Implement validateResolved() method.
    }
}
