<?php

namespace App\Http\Controllers;

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
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class RepairController extends AppBaseController
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

    private function generateRandomString($length = 8) {
        $characters = '123456789ABCDEGKLMNPSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    /**
     * Display a listing of the Repair.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->repairRepository->pushCriteria(new RequestCriteria($request));
        $repair = $this->repairRepository->orderBy('created_at','desc')->get();
        $repairs = $repair->where('archived','0')
                          ;
        return view('repairs.index')
            ->with('repairs', $repairs);
    }

    /**
     * Show the form for creating a new Repair.
     *
     * @return Response
     */
    public function create()
    {
        $reference = 'REF-' . $this->generateRandomString();
        $wreckers = $this->wreckerRepository->all()->pluck('fullname','id');
        $categories = $this->vehiclecategoryRepository->all()->pluck('fullname','id');
        $clients = $this->clientRepository->all()->pluck('fullnamePhone','id');
        $peoples = $this->peopletypeRepository->all()->pluck('label','id');
        $criterias = $this->criteriaRepository->all();
        return view('repairs.create', compact('reference','wreckers','categories','clients','peoples','criterias'));
    }

    /**
     * Store a newly created Repair in storage.
     *
     * @param CreateRepairRequest $request
     *
     * @return Response
     */
    public function store(CreateRepairRequest $request)
    {
        $input = $request->all();

        if(!$request->has('client_id')){
            $client = [
                'fullname'=>$request->get('fullname'),
                'cni'=>$request->get('cni'),
                'num_license'=>$request->get('num_license'),
                'passport'=>$request->get('passport'),
                'phone1'=>$request->get('phone1'),
                'phone2'=>$request->get('phone2'),
            ];
            $nc = $this->clientRepository->create($client);
            $input['client_id'] = $nc->id;
        }

        $repair = $this->repairRepository->create($input);

        $criterias = $this->criteriaRepository->all();
        $yes = (is_array($request->get('yes')))?$request->get('yes'):[];
        foreach($criterias as $v){
            $cr = [
                'criteria_id'=>$v->id,
                'repair_id'=>$repair->id,
                'yes'=>(in_array($v->id,array_keys($yes)))?1:0,
                'number'=>$request->get('num')[$v->id],
                'comments'=>$request->get('comments')[$v->id],
            ];
            $nc = $this->criteriaRepairRepo->create($cr);
        }     

        Flash::success('Dépannage crée avec succès.');

        return redirect(route('repairs.index'));
    }

    /**
     * Display the specified Repair.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $repair = $this->repairRepository->findWithoutFail($id);

        if (empty($repair)) {
            Flash::error('Dépannage introuvable');

            return redirect(route('repairs.index'));
        }

        return view('repairs.show')->with('repair', $repair);
    }

    /**
     * Print Invoice the specified Repair.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function printDetail($id)
    {
        $repair = $this->repairRepository->findWithoutFail($id);

        if (empty($repair)) {
            Flash::error('Dépannage introuvable');

            return redirect(route('repairs.index'));
        }

        return view('repairs.invoice')->with('repair', $repair);
    }

    /**
     * Print Receipt the specified Repair.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function recu($id)
    {
        $repair = $this->repairRepository->findWithoutFail($id);
        if (empty($repair)) {
            Flash::error('Dépannage introuvable');
            return redirect(route('repairs.index'));
        }
        return view('repairs.recu')->with('repair', $repair);
    }

    /**
     * Print Invoice the specified Repair.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function getPayment($id)
    {
        $repair = $this->repairRepository->findWithoutFail($id);
        if (empty($repair)) {
            Flash::error('Dépannage introuvable');

            return redirect(route('repairs.index'));
        }
        return view('repairs.payment')->with('repair', $repair);
    }

    /**
     * Print Invoice the specified Repair.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function postPayment($id, CreateTransactionRequest $request)
    {
        $repair = $this->repairRepository->findWithoutFail($id);

        if (empty($repair)) {
            Flash::error('Dépannage introuvable');

            return redirect(route('repairs.index'));
        }

        $input = $request->all();
        $transaction = $this->transactionRepository->create($input);
        
        $repair->date_release = gmdate('Y-m-d');
        $repair->state = 'closed';
        $repair->total_amount = $repair->sumDays()+$repair->tva();
        $repair->save();

        Flash::success('Le paiement enregisté avec succès.');

        return redirect(route('repairs.index'));
    }


    /**
     * Show the form for editing the specified Repair.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $repair = $this->repairRepository->findWithoutFail($id);

        if (empty($repair)) {
            Flash::error('Dépannage introuvable');

            return redirect(route('repairs.index'));
        }
        $wreckers = $this->wreckerRepository->all()->pluck('fullname','id');
        $categories = $this->vehiclecategoryRepository->all()->pluck('fullname','id');
        $clients = $this->clientRepository->all()->pluck('fullnamePhone','id');
        $peoples = $this->peopletypeRepository->all()->pluck('label','id');
        $criterias = $this->criteriaRepository->all();
        //dd($repair->criterias->toArray());
        return view('repairs.edit', compact('wreckers','categories','clients','peoples','criterias'))->with('repair', $repair);
    }

    /**
     * Update the specified Repair in storage.
     *
     * @param  int              $id
     * @param UpdateRepairRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRepairRequest $request)
    {
        $repair = $this->repairRepository->findWithoutFail($id);

        if (empty($repair)) {
            Flash::error('Dépannage introuvable');

            return redirect(route('repairs.index'));
        }
        $input = $request->all();
        $repair = $this->repairRepository->update($input, $id);
        $criterias = $this->criteriaRepository->all();
        $repair->criterias()->sync([]);
        foreach($criterias as $v){
            $cr = [
                'criteria_id'=>$v->id,
                'repair_id'=>$repair->id,
                //  'yes'=>(in_array($v->id,array_keys($request->get('yes'))))?1:0,
                'number'=>$request->get('num')[$v->id],
                'comments'=>$request->get('comments')[$v->id],
            ];
            $nc = $this->criteriaRepairRepo->create($cr);
        }
        Flash::success('Dépannage modifié avec succès.');

        return redirect(route('repairs.index'));
    }

    /**
     * Remove the specified Repair from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $repair = $this->repairRepository->findWithoutFail($id);

        if (empty($repair)) {
            Flash::error('Dépannage introuvable');

            return redirect(route('repairs.index'));
        }

        $this->repairRepository->delete($id);

        Flash::success('Dépannage supprimé avec succès.');

        return redirect(route('repairs.index'));
    }

    public function archive($id)
    {
        $repair = $this->repairRepository->findWithoutFail($id);

        if (empty($repair)) {
            Flash::error('Dépannage introuvable');

            return redirect(route('repairs.index'));
        }

        if(DB::statement("UPDATE repairs SET archived = 1 WHERE id = '$repair->id'") == 1) {
            Flash::success('Dépannage supprimé avec succès.');
        }

        return redirect(route('repairs.index'));
    }
   

}
