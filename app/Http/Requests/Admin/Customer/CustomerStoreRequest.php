<?php

namespace App\Http\Requests\Admin\Customer;

use App\Enums\CustomerSexEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CustomerStoreRequest extends FormRequest
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
     * @return array<string, Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => 'required|max:50',
            'last_name' => 'required|max:50',
            'email' => 'required||max:50',
            'sex' => ['nullable', Rule::in(CustomerSexEnum::values())],
            'birth_date' => 'nullable|date',
        ];
    }
}
