<?php

namespace App\Repositories\Crop;

use App\Models\Crop\Customer;
use App\Repositories\BaseRepository;

class CustomerRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'full_name',
        'phone_number',
        'email',
        'address'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Customer::class;
    }
}
