<?php

namespace App\Http\Requests\Admin\EmailTemplate;

use App\Enums\CustomerSexEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EmailTemplateUpdateRequest extends FormRequest
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
            'template_name' => 'required|max:255',
            'subject' => 'required|max:255',
            'body' => 'required',
        ];
    }
}
