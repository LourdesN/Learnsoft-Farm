<?php

namespace App\Repositories\Crop;

use App\Models\Crop\StoredCrop;
use App\Repositories\BaseRepository;

class StoredCropRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'crop_id',
        'quantity',
        'storage_date',
        'storage_id',
        'harvest_id'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return StoredCrop::class;
    }
}
