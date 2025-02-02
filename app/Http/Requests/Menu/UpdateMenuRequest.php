<?php

namespace App\Http\Requests\Menu;

use App\Repository\Eloquent\CooperatorRepository;
use Illuminate\Foundation\Http\FormRequest;

class UpdateMenuRequest extends FormRequest
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
            'parent_id' => 'nullable',
            'title' => 'required',
            'url' => 'required',
            'type' => 'required',
            'visibility' => 'required',
            'order' => 'required'
        ];
    }

    public function validateResolved()
    {
        // TODO: Implement validateResolved() method.
    }
}
