<?php

namespace App\Repositories;

use App\Models\Complaint;
use InfyOm\Generator\Common\BaseRepository;

class ComplaintRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'client_id',
        'user_id',
        'vehicle_rights',
        'brand',
        'car_imm',
        'date_getting',
        'place_getting',
        'reasons',
        'goals'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Complaint::class;
    }
}
