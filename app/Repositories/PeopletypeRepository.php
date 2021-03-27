<?php

namespace App\Repositories;

use App\Models\Peopletype;
use InfyOm\Generator\Common\BaseRepository;

class PeopletypeRepository extends BaseRepository
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
        return Peopletype::class;
    }
}
