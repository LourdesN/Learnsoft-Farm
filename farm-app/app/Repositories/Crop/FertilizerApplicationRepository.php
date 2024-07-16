<?php

namespace App\Repositories\Crop;

use App\Models\Crop\FertilizerApplication;
use App\Repositories\BaseRepository;

class FertilizerApplicationRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'stock_id',
        'application_date',
        'quantity'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return FertilizerApplication::class;
    }
}
