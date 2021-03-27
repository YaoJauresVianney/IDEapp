<?php

namespace App\Repositories;

use App\Models\Pricepenality;
use InfyOm\Generator\Common\BaseRepository;

class PricepenalityRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'vehiclecategory_id',
        'peopletype_id',
        'code',
        'penality_per_day'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Pricepenality::class;
    }
}
