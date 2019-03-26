<?php

namespace App\Http\Requests;

use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Foundation\Http\FormRequest;

class OrderStoreRequest extends FormRequest
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
            'price' => 'required',
            'user_id' => 'required|integer',
            'discount_percentage' => 'required|integer',
            'quantity' => 'required',
            'status' => 'nullable|string|max:100',
            'delay' => 'nullable|integer',
            'products' => 'required',
                "foods" => 'nullable|array',
                "drinks" => 'nullable|array',
                "menus" => 'nullable|array',
        ];
    }
    
   
    
    /**
     * Handle a failed validation attempt.
     *
     * @param  \Illuminate\Contracts\Validation\Validator  $validator
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function failedValidation(Validator $validator)
    {
        $errors = (new ValidationException($validator ))->errors();
        
        throw new HttpResponseException(response()->json([
            'errors' => $errors
            ], 
            JsonResponse::HTTP_UNPROCESSABLE_ENTITY));
    }
}
