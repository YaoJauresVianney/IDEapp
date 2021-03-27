<?php

namespace App\Repositories;

use App\Models\Repair;
use InfyOm\Generator\Common\BaseRepository;
use Carbon\Carbon;

/**
 * Class RepairRepository
 * @package App\Repositories
 * @version April 26, 2018, 3:36 am UTC
 *
 * @method Repair findWithoutFail($id, $columns = ['*'])
 * @method Repair find($id, $columns = ['*'])
 * @method Repair first($columns = ['*'])
*/
class RepairRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'wrecker_id',
        'client_id',
        'vehiclecategory_id',
        'peopletype_id',
        'reference',
        'license',
        'reasons',
        'date_getting',
        'place_getting',
        'hour_getting',
        'exchanger',
        'counter',
        'kms',
        'extension',
        'charge',
        'pc',
        'scope',
        'tvs_place',
        'others',
        'luggage',
        'car_license',
        'car_keys',
        'car_brand',
        'car_type',
        'car_imm',
        'attachments',
        'state',
        'date_release',
        'total_amount'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Repair::class;
    }

    public function inParc()
    {
        return Repair::where('date_release', '=', null)->get();
    }

    public function release()
    {
        return Repair::whereDate('date_release', '=', Carbon::today()->toDateString())->get();
    }
}
