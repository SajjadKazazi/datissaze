<?php

namespace App\Http\Requests\Slider;

use App\Repository\Eloquent\CooperatorRepository;
use Illuminate\Foundation\Http\FormRequest;

class UpdateSliderRequest extends FormRequest
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
            'img' => 'required',
            'order' => 'nullable',
            'visibility'=>'required',
            'action'=>'nullable',
            'title'=>'required',
        ];
    }
}
