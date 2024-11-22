<?php

namespace App\Http\Requests;

use App\Models\Task;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TaskUpdateRequest extends FormRequest
{
    const ID = 'id';
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
            self::ID => [
                'required',
                Rule::exists(Task::TABLE, Task::ID)
            ],
            self::PROJECT_ID => [
                'required',
                Rule::exists(Task::TABLE, Task::PROJECT_ID)
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
            ]
        ];
    }
}
