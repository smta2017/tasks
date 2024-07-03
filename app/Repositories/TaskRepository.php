<?php

namespace App\Repositories;

use App\Models\Task;
use App\Repositories\BaseRepository;

class TaskRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'title',
        'description',
        'created_by',
        'assigned_to',
        'created_at',
        'updated_at'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Task::class;
    }
}
