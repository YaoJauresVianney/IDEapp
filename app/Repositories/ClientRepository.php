<?php

namespace App\Repositories;

use App\Models\Client;
use InfyOm\Generator\Common\BaseRepository;
use Carbon\Carbon;

/**
 * Class ClientRepository
 * @package App\Repositories
 * @version April 24, 2018, 1:39 am UTC
 *
 * @method Client findWithoutFail($id, $columns = ['*'])
 * @method Client find($id, $columns = ['*'])
 * @method Client first($columns = ['*'])
*/
class ClientRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'fullname',
        'cni',
        'passport',
        'num_license',
        'attachment',
        'phone1',
        'phone2'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Client::class;
    }

    public function newClients()
    {
        return Client::whereDate('created_at', '=', Carbon::today()->toDateString())->get();
    }
}
