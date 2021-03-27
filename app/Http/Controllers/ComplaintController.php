<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateComplaintRequest;
use App\Http\Requests\UpdateComplaintRequest;
use App\Repositories\ComplaintRepository;
use App\Repositories\ClientRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ComplaintController extends AppBaseController
{
    /** @var  ComplaintRepository */
    private $complaintRepository;

    /** @var  ClientRepository */
    private $clientRepository;

    public function __construct(ComplaintRepository $complaintRepo, ClientRepository $clientRepo)
    {
        $this->complaintRepository = $complaintRepo;
        $this->clientRepository = $clientRepo;
    }

    /**
     * Display a listing of the Complaint.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->complaintRepository->pushCriteria(new RequestCriteria($request));
        $complaints = $this->complaintRepository->all();

        return view('complaints.index')
            ->with('complaints', $complaints);
    }

    /**
     * Show the form for creating a new Complaint.
     *
     * @return Response
     */
    public function create()
    {
        $clients = $this->clientRepository->all()->pluck('fullname_phone','id');
        return view('complaints.create', compact('clients'));
    }

    /**
     * Store a newly created Complaint in storage.
     *
     * @param CreateComplaintRequest $request
     *
     * @return Response
     */
    public function store(CreateComplaintRequest $request)
    {
        $input = $request->all();

        $complaint = $this->complaintRepository->create($input);

        Flash::success('Réclamation crée avec succès.');

        return redirect(route('complaints.index'));
    }

    /**
     * Display the specified Complaint.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $complaint = $this->complaintRepository->findWithoutFail($id);

        if (empty($complaint)) {
            Flash::error('Réclamation introuvable');

            return redirect(route('complaints.index'));
        }

        return view('complaints.show')->with('complaint', $complaint);
    }

    /**
     * Show the form for editing the specified Complaint.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $complaint = $this->complaintRepository->findWithoutFail($id);

        if (empty($complaint)) {
            Flash::error('Réclamation introuvable');

            return redirect(route('complaints.index'));
        }
        $clients = $this->clientRepository->all()->pluck('fullname_phone','id');
        return view('complaints.edit', compact('clients'))->with('complaint', $complaint);
    }

    /**
     * Update the specified Complaint in storage.
     *
     * @param  int              $id
     * @param UpdateComplaintRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateComplaintRequest $request)
    {
        $complaint = $this->complaintRepository->findWithoutFail($id);

        if (empty($complaint)) {
            Flash::error('Réclamation introuvable');

            return redirect(route('complaints.index'));
        }

        $complaint = $this->complaintRepository->update($request->all(), $id);

        Flash::success('Réclamation modifiée avec succès.');

        return redirect(route('complaints.index'));
    }

    /**
     * Remove the specified Complaint from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $complaint = $this->complaintRepository->findWithoutFail($id);

        if (empty($complaint)) {
            Flash::error('Réclamation introuvable');

            return redirect(route('complaints.index'));
        }

        $this->complaintRepository->delete($id);

        Flash::success('Réclamation supprimée avec succès.');

        return redirect(route('complaints.index'));
    }
}
