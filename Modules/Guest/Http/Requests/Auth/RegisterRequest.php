<?php

namespace Modules\Guest\Http\Requests\Auth;

use App\Enums\UserType;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'email'     => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'user-type' => ['required', 'in:' . join(', ', UserType::stringCases())],
            'city'      => ['required', 'numeric', 'exists:cities,object_code'],
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }
}
