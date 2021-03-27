<?php

namespace App\Repositories;

use App\Models\Wrecker;
use InfyOm\Generator\Common\BaseRepository;

class WreckerRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'code',
        'car_imm',
        'label',
        'is_enabled'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Wrecker::class;
    }

    public function available()
    {
        return Wrecker::where('is_enabled','=',1)->get();
    }
}
