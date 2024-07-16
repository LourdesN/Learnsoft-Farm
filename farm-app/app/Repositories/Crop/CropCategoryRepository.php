<?php

namespace App\Repositories\Crop;

use App\Models\Crop\CropCategory;
use App\Repositories\BaseRepository;

class CropCategoryRepository extends BaseRepository
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
        return CropCategory::class;
    }
}
