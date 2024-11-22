<?php

namespace App\Http\Requests;

use App\Models\Project;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProjectUpdateRequest extends FormRequest
{
    const ID = 'id';
    const NAME = 'name';

    public function authorize(): bool
    {
        // TODO: Fix when user auth logic is implemented
        return true;
    }

    public function rules(): array
    {
        return [
            self::ID => [
                'required',
                Rule::exists(Project::TABLE, Project::ID)
            ],
            self::NAME => [
                'required',
                'string',
                'min:1',
                'max:100'
            ],
        ];
    }
}
