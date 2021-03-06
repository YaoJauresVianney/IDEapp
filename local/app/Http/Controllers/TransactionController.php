<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;
use App\Repositories\TransactionRepository;
use App\Repositories\UserRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class TransactionController extends AppBaseController
{
    /** @var  TransactionRepository */
    private $transactionRepository;
    private $userRepository;

    public function __construct(TransactionRepository $transactionRepo, UserRepository $userRepo)
    {
        $this->transactionRepository = $transactionRepo;
        $this->userRepository = $userRepo;
    }
    /**
     * Display a listing of the Transaction.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->transactionRepository->pushCriteria(new RequestCriteria($request));
        $transactions = $this->transactionRepository->orderBy('created_at','desc')->get();
        
        return view('transactions.index')
            ->with('transactions', $transactions);
    }

    /**
     * Show the form for creating a new Transaction.
     *
     * @return Response
     */
    public function create()
    {
        $users = $this->userRepository->selectList();
        return view('transactions.create', compact('users'));
    }

    /**
     * Store a newly created Transaction in storage.
     *
     * @param CreateTransactionRequest $request
     *
     * @return Response
     */
    public function store(CreateTransactionRequest $request)
    {
        $input = $request->except('created_at');
        $transaction = $this->transactionRepository->create($input);
        $transaction->created_at = str_replace('T'," ",$request->get('created_at'));
        $transaction->save();

        Flash::success('Transaction crée avec succès.');

        return redirect(route('transactions.index'));
    }

    /**
     * Display the specified Transaction.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $transaction = $this->transactionRepository->findWithoutFail($id);

        if (empty($transaction)) {
            Flash::error('Transaction introuvable');

            return redirect(route('transactions.index'));
        }

        return view('transactions.show')->with('transaction', $transaction);
    }

    /**
     * Show the form for editing the specified Transaction.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $users = $this->userRepository->selectList();
        $transaction = $this->transactionRepository->findWithoutFail($id);

        if (empty($transaction)) {
            Flash::error('Transaction introuvable');

            return redirect(route('transactions.index'));
        }

        return view('transactions.edit', compact('users'))->with('transaction', $transaction);
    }

    /**
     * Update the specified Transaction in storage.
     *
     * @param  int              $id
     * @param UpdateTransactionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTransactionRequest $request)
    {
       $transaction = $this->transactionRepository->findWithoutFail($id);

        if (empty($transaction)) {
            Flash::error('Transaction introuvable');

            return redirect(route('transactions.index'));
        }

        $transaction = $this->transactionRepository->update($request->except('created_at'), $id);
        $transaction->created_at = str_replace('T'," ",$request->get('created_at'));
        $transaction->save();

        Flash::success('Transaction modifiée avec succès.');

        return redirect(route('transactions.index'));
    }

    /**
     * Remove the specified Transaction from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $transaction = $this->transactionRepository->findWithoutFail($id);

        if (empty($transaction)) {
            Flash::error('Transaction introuvable');

            return redirect(route('transactions.index'));
        }

        $this->transactionRepository->delete($id);

        Flash::success('Transaction supprimée avec succès.');

        return redirect(route('transactions.index'));
    }
}
