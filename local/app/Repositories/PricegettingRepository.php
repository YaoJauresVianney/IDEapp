<?php

namespace App\Repositories;

use App\Models\Pricegetting;
use InfyOm\Generator\Common\BaseRepository;

class PricegettingRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'vehiclecategory_id',
        'peopletype_id',
        'code',
        'price_day',
        'price_night'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Pricegetting::class;
    }
}
