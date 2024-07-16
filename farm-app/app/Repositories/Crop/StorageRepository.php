<?php

namespace App\Repositories\Crop;

use App\Models\Crop\Storage;
use App\Repositories\BaseRepository;

class StorageRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'location',
        'capacity'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Storage::class;
    }
}
