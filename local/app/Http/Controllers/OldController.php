<?php


namespace App\Http\Controllers;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreateRepairRequest;
use App\Http\Requests\UpdateRepairRequest;
use App\Http\Requests\CreateTransactionRequest;
use App\Repositories\RepairRepository;
use App\Repositories\TransactionRepository;
use App\Repositories\ClientRepository;
use App\Repositories\VehiclecategoryRepository;
use App\Repositories\WreckerRepository;
use App\Repositories\PeopletypeRepository;
use App\Repositories\CriteriaRepository;
use App\Repositories\CriteriaRepairRepository;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class OldController extends  AppBaseController
{

    /** @var  RepairRepository */
    private $repairRepository;

    /** @var  CriteriaRepairRepository */
    private $criteriaRepairRepository;

    /** @var  ClientRepository */
    private $clientRepository;

    /** @var  VehiclecategoryRepository */
    private $vehiclecategoryRepository;

    /** @var  WreckerRepository */
    private $wreckerRepository;

    /** @var  PeopletypeRepository */
    private $peopletypeRepository;

    /** @var  CriteriaRepository */
    private $criteriaRepository;

    /** @var  TransactionRepository */
    private $transactionRepository;

    public function __construct(RepairRepository $repairRepo,
                                CriteriaRepairRepository $criteriaRepairRepo,
                                TransactionRepository $transactionRepo,
                                ClientRepository $clientRepo,
                                VehiclecategoryRepository $vehiclecategoryRepo,
                                WreckerRepository $wreckerRepo,
                                PeopletypeRepository $peopletypeRepo,
                                CriteriaRepository $criteriaRepo)
    {
        $this->repairRepository = $repairRepo;
        $this->criteriaRepairRepo = $criteriaRepairRepo;
        $this->transactionRepository = $transactionRepo;
        $this->clientRepository = $clientRepo;
        $this->vehiclecategoryRepository = $vehiclecategoryRepo;
        $this->wreckerRepository = $wreckerRepo;
        $this->peopletypeRepository = $peopletypeRepo;
        $this->criteriaRepository = $criteriaRepo;

    }

    public function index(Request $request)
    {
        $this->repairRepository->pushCriteria(new RequestCriteria($request));
        $repair = $this->repairRepository->orderBy('date_getting','desc')->get();
        $repairs = $repair->where('archived','1')->where('state','pending')
            ->take(500);
        return view('Old.index')
            ->with('repairs', $repairs);
    }
}