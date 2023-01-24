<?php

namespace App\Http\Requests\Mobile\User\V1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class ReviewRequest extends FormRequest
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
            'user_id' => 'required|string',
            'user_name' => 'required|string',
            'business_id' => 'required|integer',
            'description' => 'required|string',
            'rating' => 'required|integer'
        ];
    }


    public function messages()
    {
        return [
            'user_id.required' => 'User ID is required',
            'user_id.string' => 'User ID must be string',
            'user_name.required' => 'User Name is required',
            'user_name.string' => 'User Name must be string',
            'business_id.required' => 'Business ID is required',
            'business_id.integer' => 'Business ID must be integer',
            'description.required' => 'Description is required',
            'description.string' => 'Description must be string',
            'rating.required' => 'Rating is required',
            'rating.string' => 'Rating must be string',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'error'   => true,
            'message'   => 'Validation errors',
            'data'      => $validator->errors()
        ]));
    }
}