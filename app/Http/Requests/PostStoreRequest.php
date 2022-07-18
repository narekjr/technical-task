<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'website_id' => [
                'required',
                'integer',
                'exists:websites,id'
            ],
            'content' => [
                'required',
                'string',
                'max:1000'
            ],
        ];
    }
}
