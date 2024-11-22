<?php

namespace App\Http\Requests;

use App\Models\Project;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TaskStoreRequest extends FormRequest
{
    const PROJECT_ID = 'project_id';
    const NAME = 'name';
    const DUE_DATE = 'due_date';

    public function authorize(): bool
    {
        // TODO: Fix when user auth logic is implemented
        return true;
    }

    public function rules(): array
    {
        return [
            self::PROJECT_ID => [
                'required',
                Rule::exists(Project::TABLE, Project::ID)
            ],
            self::NAME => [
                'required',
                'string',
                'min:1',
                'max:100'
            ],
            self::DUE_DATE => [
                'required',
                'date',
                'after:now'
            ],
        ];
    }
}
