<?php

namespace App\Http\Controllers;

//use App\models\User;

//use App\Http\Requests\CreateUserRequest;

use App\Repositories\RepairRepository;
use App\Repositories\TransactionRepository;
use App\Repositories\ClientRepository;
use App\Repositories\WreckerRepository;
use App\Repositories\UserRepository;

use Auth;

class HomeController extends Controller
{
    /** @var  RepairRepository */
    private $repairRepository;

    /** @var  ClientRepository */
    private $clientRepository;

    /** @var  WreckerRepository */
    private $wreckerRepository;

    /** @var  TransactionRepository */
    private $transactionRepository;

    /** @var  UserRepository */
    private $userRepository;

    public function __construct(RepairRepository $repairRepo,
        TransactionRepository $transactionRepo,
        ClientRepository $clientRepo,
        WreckerRepository $wreckerRepo,
        UserRepository $userRepo)
    {
        $this->middleware('auth');

        $this->repairRepository = $repairRepo;
        $this->transactionRepository = $transactionRepo;
        $this->clientRepository = $clientRepo;
        $this->wreckerRepository = $wreckerRepo;
        $this->userRepository = $userRepo;
    }

    /**
     * Show the application dashboard.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Auth::user()->update(['is_enabled'=>true]);
        // dd(User::find(4)->update(['password'=>bcrypt('gerant')]));
        $newClients = $this->clientRepository->newClients();
        $repairs = $this->repairRepository->all();
        $inParc = $this->repairRepository->inParc();
        $release = $this->repairRepository->release();
        $income = $this->transactionRepository->income();
        $todayIncome = $this->transactionRepository->todayIncome();
        $outcome = $this->transactionRepository->outcome();
        $todayOutcome = $this->transactionRepository->todayOutcome();
        $wavailable = $this->wreckerRepository->available();
        $users = $this->userRepository->all();
        return view('home', compact('newClients','repairs','inParc','release','income','outcome','todayIncome','todayOutcome','wavailable','users'));
    }
    /*public function test() {
        $user = new User;
        $user->name = 'Bouazo';
        $user->email = 'bouazo@ide.ci';
        $user->password = bcrypt('boigny');
        $user->role = 'gerant';

        $user->save() ;
    }*/
}
