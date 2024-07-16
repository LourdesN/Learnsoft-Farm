<?php

namespace App\Repositories\Crop;

use App\Models\Crop\Expense_Category;
use App\Repositories\BaseRepository;

class Expense_CategoryRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'name'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Expense_Category::class;
    }
}
