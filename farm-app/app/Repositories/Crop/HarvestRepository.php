<?php

namespace App\Repositories\Crop;

use App\Models\Crop\Harvest;
use App\Repositories\BaseRepository;

class HarvestRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'crop_id',
        'harvest_date',
        'quantity',
        'quality'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Harvest::class;
    }
}
