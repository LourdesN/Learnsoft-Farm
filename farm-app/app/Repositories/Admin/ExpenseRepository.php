<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Expense;
use App\Repositories\BaseRepository;

class ExpenseRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'description',
        'amount',
        'expense_date',
        'expense_category'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Expense::class;
    }
}
