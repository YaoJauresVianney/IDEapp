<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateVehiclecategoryRequest;
use App\Http\Requests\UpdateVehiclecategoryRequest;
use App\Repositories\VehiclecategoryRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class VehiclecategoryController extends AppBaseController
{
    /** @var  VehiclecategoryRepository */
    private $vehiclecategoryRepository;

    public function __construct(VehiclecategoryRepository $vehiclecategoryRepo)
    {
        $this->vehiclecategoryRepository = $vehiclecategoryRepo;
    }

    /**
     * Display a listing of the Vehiclecategory.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->vehiclecategoryRepository->pushCriteria(new RequestCriteria($request));
        $vehiclecategories = $this->vehiclecategoryRepository->all();

        return view('vehiclecategories.index')
            ->with('vehiclecategories', $vehiclecategories);
    }

    /**
     * Show the form for creating a new Vehiclecategory.
     *
     * @return Response
     */
    public function create()
    {
        return view('vehiclecategories.create');
    }

    /**
     * Store a newly created Vehiclecategory in storage.
     *
     * @param CreateVehiclecategoryRequest $request
     *
     * @return Response
     */
    public function store(CreateVehiclecategoryRequest $request)
    {
        $input = $request->all();

        $vehiclecategory = $this->vehiclecategoryRepository->create($input);

        Flash::success('Catégorie crée avec succès.');

        return redirect(route('vehiclecategories.index'));
    }

    /**
     * Display the specified Vehiclecategory.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $vehiclecategory = $this->vehiclecategoryRepository->findWithoutFail($id);

        if (empty($vehiclecategory)) {
            Flash::error('Catégorie introuvable');

            return redirect(route('vehiclecategories.index'));
        }

        return view('vehiclecategories.show')->with('vehiclecategory', $vehiclecategory);
    }

    /**
     * Show the form for editing the specified Vehiclecategory.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $vehiclecategory = $this->vehiclecategoryRepository->findWithoutFail($id);

        if (empty($vehiclecategory)) {
            Flash::error('Catégorie introuvable');

            return redirect(route('vehiclecategories.index'));
        }

        return view('vehiclecategories.edit')->with('vehiclecategory', $vehiclecategory);
    }

    /**
     * Update the specified Vehiclecategory in storage.
     *
     * @param  int              $id
     * @param UpdateVehiclecategoryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateVehiclecategoryRequest $request)
    {
        $vehiclecategory = $this->vehiclecategoryRepository->findWithoutFail($id);

        if (empty($vehiclecategory)) {
            Flash::error('Catégorie introuvable');

            return redirect(route('vehiclecategories.index'));
        }

        $vehiclecategory = $this->vehiclecategoryRepository->update($request->all(), $id);

        Flash::success('Catégorie modifiée avec succès.');

        return redirect(route('vehiclecategories.index'));
    }

    /**
     * Remove the specified Vehiclecategory from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $vehiclecategory = $this->vehiclecategoryRepository->findWithoutFail($id);

        if (empty($vehiclecategory)) {
            Flash::error('Catégorie introuvable');

            return redirect(route('vehiclecategories.index'));
        }

        $this->vehiclecategoryRepository->delete($id);

        Flash::success('Catégorie supprimé avec succès.');

        return redirect(route('vehiclecategories.index'));
    }
}
