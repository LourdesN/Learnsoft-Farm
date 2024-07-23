<?php

namespace App\Repositories\Crop;

use App\Models\Crop\Staging;
use App\Repositories\BaseRepository;

class StagingRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'crop_id',
        'quantity'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Staging::class;
    }
}
