<?php

namespace App\Repositories;

use App\Models\Transaction;
use InfyOm\Generator\Common\BaseRepository;
use Carbon\Carbon;

class TransactionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'type',
        'amount',
        'desc',
        'way_of',
        'num_transaction'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Transaction::class;
    }

    public function income()
    {
        $income = Transaction::where('type','=','income')->sum('amount');
        return $income;
    }

    public function outcome()
    {
        $outcome = Transaction::where('type','=','outcome')->sum('amount');
        return $outcome;
    }

    public function todayIncome()
    {
        $outcome = Transaction::whereDate('created_at', '=', Carbon::today()->toDateString())
                                ->where('type','=','income')->sum('amount');
        return $outcome;
    }

    public function todayOutcome()
    {
        $outcome = Transaction::whereDate('created_at', '=', Carbon::today()->toDateString())
                                ->where('type','=','outcome')->sum('amount');
        return $outcome;
    }
}
