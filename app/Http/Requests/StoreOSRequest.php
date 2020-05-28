<?php


namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreOSRequest extends FormRequest
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
            'client_nic'    => 'required',
            'os'    => 'required|unique:order_services',
            'user_id'    => 'required|numeric',
        ];
    }
    public function messages()
    {
        return [
            'client_nic.required'    => 'client_nic is required',
            'os.required'    => 'os is required',
            'os.unique'    => 'os really exist',
            'user_id.required'    => 'user_id is required',
            'user_id.numeric'    => 'user_id must be numeric',
        ];
    }

    protected function failedValidation(Validator $validator) {
        //throw new HttpResponseException(response()->json($validator->errors(), 422));
        throw new HttpResponseException(response()->json($validator->errors(), 200));
    }
}
