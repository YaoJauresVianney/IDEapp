<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePricegettingRequest;
use App\Http\Requests\UpdatePricegettingRequest;
use App\Repositories\PricegettingRepository;
use App\Repositories\VehiclecategoryRepository;
use App\Repositories\PeopletypeRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class PricegettingController extends AppBaseController
{
    /** @var  PricegettingRepository */
    private $pricegettingRepository;

    /** @var  VehiclecategoryRepository */
    private $vehiclecategoryRepository;

    /** @var  PeopletypeRepository */
    private $peopletypeRepository;

    public function __construct(PricegettingRepository $pricegettingRepo,
                            VehiclecategoryRepository $vehiclecategoryRepo,
                            PeopletypeRepository $peopletypeRepo)
    {
        $this->pricegettingRepository = $pricegettingRepo;
        $this->vehiclecategoryRepository = $vehiclecategoryRepo;
        $this->peopletypeRepository = $peopletypeRepo;
    }

    /**
     * Display a listing of the Pricegetting.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->pricegettingRepository->pushCriteria(new RequestCriteria($request));
        $pricegettings = $this->pricegettingRepository->all();
        
        return view('pricegettings.index')
            ->with('pricegettings', $pricegettings);
    }

    /**
     * Show the form for creating a new Pricegetting.
     *
     * @return Response
     */
    public function create()
    {
        $categories = $this->vehiclecategoryRepository->all()->pluck('fullname','id');
        $peoples = $this->peopletypeRepository->all()->pluck('label','id');
        return view('pricegettings.create', compact('categories','peoples'));
    }

    /**
     * Store a newly created Pricegetting in storage.
     *
     * @param CreatePricegettingRequest $request
     *
     * @return Response
     */
    public function store(CreatePricegettingRequest $request)
    {
        $input = $request->all();

        $pricegetting = $this->pricegettingRepository->create($input);

        Flash::success('Tarification crée avec succès.');

        return redirect(route('pricegettings.index'));
    }

    /**
     * Display the specified Pricegetting.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $pricegetting = $this->pricegettingRepository->findWithoutFail($id);

        if (empty($pricegetting)) {
            Flash::error('Tarification introuvable');

            return redirect(route('pricegettings.index'));
        }

        return view('pricegettings.show')->with('pricegetting', $pricegetting);
    }

    /**
     * Show the form for editing the specified Pricegetting.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $pricegetting = $this->pricegettingRepository->findWithoutFail($id);

        if (empty($pricegetting)) {
            Flash::error('Tarification introuvable');

            return redirect(route('pricegettings.index'));
        }
        $categories = $this->vehiclecategoryRepository->all()->pluck('fullname','id');
        $peoples = $this->peopletypeRepository->all()->pluck('label','id');

        return view('pricegettings.edit',compact('categories','peoples'))->with('pricegetting', $pricegetting);
    }

    /**
     * Update the specified Pricegetting in storage.
     *
     * @param  int              $id
     * @param UpdatePricegettingRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePricegettingRequest $request)
    {
        $pricegetting = $this->pricegettingRepository->findWithoutFail($id);

        if (empty($pricegetting)) {
            Flash::error('Tarification introuvable');

            return redirect(route('pricegettings.index'));
        }

        $pricegetting = $this->pricegettingRepository->update($request->all(), $id);

        Flash::success('Tarification modifiée avec succès.');

        return redirect(route('pricegettings.index'));
    }

    /**
     * Remove the specified Pricegetting from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $pricegetting = $this->pricegettingRepository->findWithoutFail($id);

        if (empty($pricegetting)) {
            Flash::error('Pricegetting introuvable');

            return redirect(route('pricegettings.index'));
        }

        $this->pricegettingRepository->delete($id);

        Flash::success('Tarification supprimée avec succès.');

        return redirect(route('pricegettings.index'));
    }
}
