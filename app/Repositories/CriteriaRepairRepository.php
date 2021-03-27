<?php

namespace App\Repositories;

use App\Models\CriteriaRepair;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class CriteriaRepairRepository
 * @package App\Repositories
 * @version April 26, 2018, 5:31 am UTC
 *
 * @method CriteriaRepair findWithoutFail($id, $columns = ['*'])
 * @method CriteriaRepair find($id, $columns = ['*'])
 * @method CriteriaRepair first($columns = ['*'])
*/
class CriteriaRepairRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'criteria_id',
        'repair_id',
        'yes',
        'number',
        'comments'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return CriteriaRepair::class;
    }
}
