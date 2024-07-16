<?php

namespace App\Repositories\Crop;

use App\Models\Crop\Revenue;
use App\Repositories\BaseRepository;

class RevenueRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'sale_id',
        'amount',
        'revenue_date'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Revenue::class;
    }
}
