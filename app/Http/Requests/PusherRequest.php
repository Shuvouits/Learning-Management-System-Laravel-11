<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PusherRequest extends FormRequest
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
            'app_id' => 'required|string',
            'app_key' => 'required|string',
            'app_secret' => 'required|string',
            'port' => 'required|string',
            'app_cluster' => 'required|string',
        ];
    }
}
