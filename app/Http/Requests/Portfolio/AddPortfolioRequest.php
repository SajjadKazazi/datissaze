<?php

namespace App\Http\Requests\Portfolio;

use Illuminate\Foundation\Http\FormRequest;

class AddPortfolioRequest extends FormRequest
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
            'slug'=> 'required|unique:portfolios,slug',
            'info' => 'nullable',
            'url' => 'nullable|url',
            'thumbnail' => 'nullable',
            'category' => 'nullable',
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
