<?php

namespace App\Repositories\Crop;

use App\Models\Crop\Purchase;
use App\Repositories\BaseRepository;

class PurchaseRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'stock_type',
        'supplier_id',
        'purchase_date',
        'quantity',
        'total_cost'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Purchase::class;
    }
}
