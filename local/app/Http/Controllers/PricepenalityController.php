<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePricepenalityRequest;
use App\Http\Requests\UpdatePricepenalityRequest;
use App\Repositories\PricepenalityRepository;
use App\Repositories\VehiclecategoryRepository;
use App\Repositories\PeopletypeRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class PricepenalityController extends AppBaseController
{
    /** @var  PricepenalityRepository */
    private $pricepenalityRepository;

    /** @var  VehiclecategoryRepository */
    private $vehiclecategoryRepository;

    /** @var  PeopletypeRepository */
    private $peopletypeRepository;

    public function __construct(PricepenalityRepository $pricepenalityRepo,
                        VehiclecategoryRepository $vehiclecategoryRepo,
                        PeopletypeRepository $peopletypeRepo)
    {
        $this->pricepenalityRepository = $pricepenalityRepo;
        $this->vehiclecategoryRepository = $vehiclecategoryRepo;
        $this->peopletypeRepository = $peopletypeRepo;
    }

    /**
     * Display a listing of the Pricepenality.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->pricepenalityRepository->pushCriteria(new RequestCriteria($request));
        $pricepenalities = $this->pricepenalityRepository->all();

        return view('pricepenalities.index')
            ->with('pricepenalities', $pricepenalities);
    }

    /**
     * Show the form for creating a new Pricepenality.
     *
     * @return Response
     */
    public function create()
    {
        $categories = $this->vehiclecategoryRepository->all()->pluck('fullname','id');
        $peoples = $this->peopletypeRepository->all()->pluck('label','id');
        return view('pricepenalities.create', compact('categories','peoples'));
    }

    /**
     * Store a newly created Pricepenality in storage.
     *
     * @param CreatePricepenalityRequest $request
     *
     * @return Response
     */
    public function store(CreatePricepenalityRequest $request)
    {
        $input = $request->all();

        $pricepenality = $this->pricepenalityRepository->create($input);

        Flash::success('Pénalité crée avec succès.');

        return redirect(route('pricepenalities.index'));
    }

    /**
     * Display the specified Pricepenality.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $pricepenality = $this->pricepenalityRepository->findWithoutFail($id);

        if (empty($pricepenality)) {
            Flash::error('Pénalité introuvable');

            return redirect(route('pricepenalities.index'));
        }

        return view('pricepenalities.show')->with('pricepenality', $pricepenality);
    }

    /**
     * Show the form for editing the specified Pricepenality.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $pricepenality = $this->pricepenalityRepository->findWithoutFail($id);

        if (empty($pricepenality)) {
            Flash::error('Pénalité introuvable');

            return redirect(route('pricepenalities.index'));
        }
        $categories = $this->vehiclecategoryRepository->all()->pluck('fullname','id');
        $peoples = $this->peopletypeRepository->all()->pluck('label','id');
        return view('pricepenalities.edit', compact('categories','peoples'))->with('pricepenality', $pricepenality);
    }

    /**
     * Update the specified Pricepenality in storage.
     *
     * @param  int              $id
     * @param UpdatePricepenalityRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePricepenalityRequest $request)
    {
        $pricepenality = $this->pricepenalityRepository->findWithoutFail($id);

        if (empty($pricepenality)) {
            Flash::error('Pénalité introuvable');

            return redirect(route('pricepenalities.index'));
        }

        $pricepenality = $this->pricepenalityRepository->update($request->all(), $id);

        Flash::success('Pénalité modifiée avec succès.');

        return redirect(route('pricepenalities.index'));
    }

    /**
     * Remove the specified Pricepenality from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $pricepenality = $this->pricepenalityRepository->findWithoutFail($id);

        if (empty($pricepenality)) {
            Flash::error('Pénalité introuvable');

            return redirect(route('pricepenalities.index'));
        }

        $this->pricepenalityRepository->delete($id);

        Flash::success('Pénalité supprimée avec succès.');

        return redirect(route('pricepenalities.index'));
    }
}
