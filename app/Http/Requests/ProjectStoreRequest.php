<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectStoreRequest extends FormRequest
{
    const NAME = 'name';

    public function authorize(): bool
    {
        // TODO: Fix when user auth logic is implemented
        return true;
    }

    public function rules(): array
    {
        return [
            self::NAME => [
                'required',
                'string',
                'min:1',
                'max:100'
            ],
        ];
    }
}
