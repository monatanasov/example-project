<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    use HasFactory;

    public const TABLE = 'tasks';

    public const ID = 'id';
    public const PROJECT_ID = 'project_id';
    public const NAME = 'name';
    public const DUE_DATE = 'due_date';

    protected $table = self::TABLE;

    protected $guarded = [
        self::ID,
    ];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}
