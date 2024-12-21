<?php

namespace App\Http\Requests\Page;

use App\Repository\Eloquent\CooperatorRepository;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePageRequest extends FormRequest
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
            'slug'=> ['required' , Rule::unique('pages','slug')->ignore($this->id)],
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
