<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePeopletypeRequest;
use App\Http\Requests\UpdatePeopletypeRequest;
use App\Repositories\PeopletypeRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class PeopletypeController extends AppBaseController
{
    /** @var  PeopletypeRepository */
    private $peopletypeRepository;

    public function __construct(PeopletypeRepository $peopletypeRepo)
    {
        $this->peopletypeRepository = $peopletypeRepo;
    }

    /**
     * Display a listing of the Peopletype.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->peopletypeRepository->pushCriteria(new RequestCriteria($request));
        $peopletypes = $this->peopletypeRepository->all();

        return view('peopletypes.index')
            ->with('peopletypes', $peopletypes);
    }

    /**
     * Show the form for creating a new Peopletype.
     *
     * @return Response
     */
    public function create()
    {
        return view('peopletypes.create');
    }

    /**
     * Store a newly created Peopletype in storage.
     *
     * @param CreatePeopletypeRequest $request
     *
     * @return Response
     */
    public function store(CreatePeopletypeRequest $request)
    {
        $input = $request->all();

        $peopletype = $this->peopletypeRepository->create($input);

        Flash::success('Catégorie de client crée avec succès.');

        return redirect(route('peopletypes.index'));
    }

    /**
     * Display the specified Peopletype.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $peopletype = $this->peopletypeRepository->findWithoutFail($id);

        if (empty($peopletype)) {
            Flash::error('Catégorie de client introuvable');

            return redirect(route('peopletypes.index'));
        }

        return view('peopletypes.show')->with('peopletype', $peopletype);
    }

    /**
     * Show the form for editing the specified Peopletype.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $peopletype = $this->peopletypeRepository->findWithoutFail($id);

        if (empty($peopletype)) {
            Flash::error('Catégorie de client introuvable');

            return redirect(route('peopletypes.index'));
        }

        return view('peopletypes.edit')->with('peopletype', $peopletype);
    }

    /**
     * Update the specified Peopletype in storage.
     *
     * @param  int              $id
     * @param UpdatePeopletypeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePeopletypeRequest $request)
    {
        $peopletype = $this->peopletypeRepository->findWithoutFail($id);

        if (empty($peopletype)) {
            Flash::error('Catégorie de client introuvable');

            return redirect(route('peopletypes.index'));
        }

        $peopletype = $this->peopletypeRepository->update($request->all(), $id);

        Flash::success('Catégorie de client modifiée avec succès.');

        return redirect(route('peopletypes.index'));
    }

    /**
     * Remove the specified Peopletype from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $peopletype = $this->peopletypeRepository->findWithoutFail($id);

        if (empty($peopletype)) {
            Flash::error('Catégorie de client introuvable');

            return redirect(route('peopletypes.index'));
        }

        $this->peopletypeRepository->delete($id);

        Flash::success('Catégorie de client supprimée avec succès.');

        return redirect(route('peopletypes.index'));
    }
}
