<?php

namespace App\Http\Requests\News;

use Illuminate\Foundation\Http\FormRequest;

class AddNewsRequest extends FormRequest
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
            'categories' => 'required',
            'description' => 'required|max:191',
            'body' => 'required',
            'slug'=> 'required|unique:news,slug',
            'active' => 'required',
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
