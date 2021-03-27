<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateWreckerRequest;
use App\Http\Requests\UpdateWreckerRequest;
use App\Repositories\WreckerRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class WreckerController extends AppBaseController
{
    /** @var  WreckerRepository */
    private $wreckerRepository;

    public function __construct(WreckerRepository $wreckerRepo)
    {
        $this->wreckerRepository = $wreckerRepo;
    }

    /**
     * Display a listing of the Wrecker.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->wreckerRepository->pushCriteria(new RequestCriteria($request));
        $wreckers = $this->wreckerRepository->all();

        return view('wreckers.index')
            ->with('wreckers', $wreckers);
    }

    /**
     * Show the form for creating a new Wrecker.
     *
     * @return Response
     */
    public function create()
    {
        return view('wreckers.create');
    }

    /**
     * Store a newly created Wrecker in storage.
     *
     * @param CreateWreckerRequest $request
     *
     * @return Response
     */
    public function store(CreateWreckerRequest $request)
    {
        $input = $request->all();

        $wrecker = $this->wreckerRepository->create($input);

        Flash::success('Dépanneuse crée avec succès.');

        return redirect(route('wreckers.index'));
    }

    /**
     * Display the specified Wrecker.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $wrecker = $this->wreckerRepository->findWithoutFail($id);

        if (empty($wrecker)) {
            Flash::error('Dépanneuse introuvable');

            return redirect(route('wreckers.index'));
        }

        return view('wreckers.show')->with('wrecker', $wrecker);
    }

    /**
     * Show the form for editing the specified Wrecker.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $wrecker = $this->wreckerRepository->findWithoutFail($id);

        if (empty($wrecker)) {
            Flash::error('Dépanneuse introuvable');

            return redirect(route('wreckers.index'));
        }

        return view('wreckers.edit')->with('wrecker', $wrecker);
    }

    /**
     * Update the specified Wrecker in storage.
     *
     * @param  int              $id
     * @param UpdateWreckerRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateWreckerRequest $request)
    {
        $wrecker = $this->wreckerRepository->findWithoutFail($id);

        if (empty($wrecker)) {
            Flash::error('Dépanneuse introuvable');

            return redirect(route('wreckers.index'));
        }

        $wrecker = $this->wreckerRepository->update($request->all(), $id);

        Flash::success('Dépanneuse modifiée avec succès.');

        return redirect(route('wreckers.index'));
    }

    /**
     * Remove the specified Wrecker from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $wrecker = $this->wreckerRepository->findWithoutFail($id);

        if (empty($wrecker)) {
            Flash::error('Dépanneuse introuvable');

            return redirect(route('wreckers.index'));
        }

        $this->wreckerRepository->delete($id);

        Flash::success('Dépanneuse supprimée avec succès.');

        return redirect(route('wreckers.index'));
    }
}
