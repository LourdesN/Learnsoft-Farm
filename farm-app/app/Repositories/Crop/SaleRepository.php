<?php

namespace App\Repositories\Crop;

use App\Models\Crop\Sale;
use App\Repositories\BaseRepository;

class SaleRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'stored_crops_id',
        'sales_date',
        'quantity',
        'price_per_unit',
        'total_price',
        'customer_id'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Sale::class;
    }
}
