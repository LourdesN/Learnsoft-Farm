<?php

namespace App\Repositories\Crop;

use App\Models\Crop\Stock;
use App\Repositories\BaseRepository;

class StockRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'name',
        'quantity',
        'stock_type',
        'price',
        'supplier_id'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Stock::class;
    }
}
