<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
            'id_sexo' => ['numeric ', 'max:255'],
            'fecha_nacimiento' => ['date', 'max:255'],
            'id_oficio' => ['numeric', 'max:255'],
            'id_carrera' => ['numeric', 'max:255'],
            'id_region' => ['numeric', 'max:255'],
        ];
    }
}
