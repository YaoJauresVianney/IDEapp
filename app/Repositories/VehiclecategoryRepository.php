<?php

namespace App\Repositories;

use App\Models\Vehiclecategory;
use InfyOm\Generator\Common\BaseRepository;

class VehiclecategoryRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'code',
        'type',
        'desc',
        'is_enabled'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Vehiclecategory::class;
    }
}
