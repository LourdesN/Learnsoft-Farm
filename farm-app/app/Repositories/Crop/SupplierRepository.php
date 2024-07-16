<?php

namespace App\Repositories\Crop;

use App\Models\Crop\Supplier;
use App\Repositories\BaseRepository;

class SupplierRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'name',
        'phone_number',
        'address',
        'supplies_type'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Supplier::class;
    }
}
