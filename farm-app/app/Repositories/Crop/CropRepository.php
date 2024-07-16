<?php

namespace App\Repositories\Crop;

use App\Models\Crop\Crop;
use App\Repositories\BaseRepository;

class CropRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'name',
        'crop_categories_id',
        'planting_date',
        'harvesting_date'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Crop::class;
    }
}
