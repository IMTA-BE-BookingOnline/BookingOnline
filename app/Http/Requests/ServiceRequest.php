<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

use Illuminate\Http\JsonResponse;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class ServiceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {

        return [
            'name' => 'required|string|unique:services',
            'categorie_id' => 'required|integer|exists:categories,id',
            'describe' => 'required|string|max:360',
            'price' => ['required', 'regex:/^\d{1,3}(,\d{3})*(\.\d{1,2})?$/'],
        ];

    }
    public function messages(): array

{

    return [
        'name.unique' => 'tên  da ton tai',
        'name.required' => 'Vui lòng nhâp name',
        'email.email' => 'Nhập đúng định dạng email!',
        'categorie_id.required' => 'nhập id category',
        'categorie_id.integer' => 'nhập id category là kiểu số nguyên',
        'categorie_id.exists' => 'không có danh mục nào',
        'describe.required' => 'Nhâp mô tả của dịch vụ',
        'describe.max' => 'tối đa 360 ký tự',
        'price.required' => 'Nhập giá tiền',
        'price.regex' => 'Nhập đúng giá tiền định dạng việt nam',


    ];

    }
    protected function failedValidation(Validator $validator)
    {

        $errors = (new ValidationException($validator))->errors();
        throw new HttpResponseException(response()->json(
            [
                'error' => $errors,
                'status_code' => 402,
            ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY));
    }
}