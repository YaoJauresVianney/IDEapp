<?php

namespace App\Repositories;

use App\Models\Criteria;
use InfyOm\Generator\Common\BaseRepository;

class CriteriaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'code',
        'label',
        'is_enabled'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Criteria::class;
    }
}
