<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'ism' => 'required|size:12',
            'yosh' => 'required|numeric|integer|max:50|min:16',
            'hujjat' => [
                'required',
                Rule::file()->extensions(['pdf'])->min('1kb')
            ],
            'rasm' => 'required|image|mimes:jpeg,jpg,png|max:1024|min:1',
            'sana' => 'required|date',
            'tugilgan_sana' => 'required|date_format:Y-m-d',
            'email' => 'required|email:rfc,dns'
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'ism' => strtoupper($this->ism)
        ]);
    }

    protected function passedValidation()
    {
        $this->replace([
            'sana' => Carbon::parse($this->sana)
        ]);
    }
}

