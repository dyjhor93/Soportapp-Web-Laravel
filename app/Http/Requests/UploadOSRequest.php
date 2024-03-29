<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
class UploadOSRequest extends FormRequest
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
            'nic'    => 'required',
            'os'    => 'required',
            //'image'    => 'required',//|image
            //'imagename'    => 'required',
            'file'=>'required|image',
        ];
    }
    public function messages()
    {
        return [
            'nic.required'    => 'nic is required',
            'os.required'    => 'os is required',
            //'image.required'    => 'image is required',
            //'imagename.required'    => 'nameimage is required',
            'file.required'    => 'file is required',
            'file.image'    => 'file must be image',
        ];
    }

    protected function failedValidation(Validator $validator) {
        throw new HttpResponseException(response()->json($validator->errors(), 200));
    }
}
