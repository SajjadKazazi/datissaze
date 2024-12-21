<?php

namespace App\Http\Requests\Resume;

use Illuminate\Foundation\Http\FormRequest;

class AddResumeRequest extends FormRequest
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
            'name' => 'required',
            'mobile' => 'required|regex:/^((0)(9){1}[0-9]{9})+$/',
            'email' => 'nullable',
            'file' => 'required|mimes:pdf|max:2048',
            'pic' => 'nullable|mimes:png,jpg,jpeg,gif,webp,bmp,tif,tiff|max:200',

        ];
    }


}
