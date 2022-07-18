<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SubscriberStoreRequest extends FormRequest
{
    protected $stopOnFirstFailure = true;

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'email' => [
                'required',
                'string',
                'email'
            ],
            'website_id' => [
                'required',
                'integer',
                'exists:websites,id',
                Rule::unique('subscribers', 'website_id')->where('email', $this->input('email'))
            ],
        ];
    }


    /**
     * Custom Error Messages
     *
     * @return string[]
     */
    public function messages()
    {
        return [
            'website_id.unique' => 'You are already subscriber of this website.',
        ];
    }
}
