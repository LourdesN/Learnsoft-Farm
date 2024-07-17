<?php

namespace App\Http\Controllers\Crop;

use App\DataTables\Crop\ExpenseDataTable;
use App\Http\Requests\Crop\CreateExpenseRequest;
use App\Http\Requests\Crop\UpdateExpenseRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Crop\Expense_Category;
use App\Repositories\Crop\ExpenseRepository;
use Illuminate\Http\Request;
use Flash;

class ExpenseController extends AppBaseController
{
    /** @var ExpenseRepository $expenseRepository*/
    private $expenseRepository;

    public function __construct(ExpenseRepository $expenseRepo)
    {
        $this->expenseRepository = $expenseRepo;
    }

    /**
     * Display a listing of the Expense.
     */
    public function index(ExpenseDataTable $expenseDataTable)
    {
    return $expenseDataTable->render('crop.expenses.index');
    }


    /**
     * Show the form for creating a new Expense.
     */
    public function create()
    {
        $expenseCategories = Expense_Category::all();
        return view('crop.expenses.create', compact('expenseCategories'));
    }

    /**
     * Store a newly created Expense in storage.
     */
    public function store(CreateExpenseRequest $request)
    {
        $input = $request->all();

        $expense = $this->expenseRepository->create($input);

        Flash::success('Expense saved successfully.');

        return redirect(route('crop.expenses.index'));
    }

    /**
     * Display the specified Expense.
     */
    public function show($id)
    {
        $expense = $this->expenseRepository->find($id);

        if (empty($expense)) {
            Flash::error('Expense not found');

            return redirect(route('crop.expenses.index'));
        }

        return view('crop.expenses.show')->with('expense', $expense);
    }

    /**
     * Show the form for editing the specified Expense.
     */
    public function edit($id)
    {
        $expense = $this->expenseRepository->find($id);
        $expenseCategories = Expense_Category::all();
        if (empty($expense)) {
            Flash::error('Expense not found');

            return redirect(route('crop.expenses.index'));
        }

        return view('crop.expenses.edit', compact('expenseCategories'))->with('expense', $expense);
    }

    /**
     * Update the specified Expense in storage.
     */
    public function update($id, UpdateExpenseRequest $request)
    {
        $expense = $this->expenseRepository->find($id);

        if (empty($expense)) {
            Flash::error('Expense not found');

            return redirect(route('crop.expenses.index'));
        }

        $expense = $this->expenseRepository->update($request->all(), $id);

        Flash::success('Expense updated successfully.');

        return redirect(route('crop.expenses.index'));
    }

    /**
     * Remove the specified Expense from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $expense = $this->expenseRepository->find($id);

        if (empty($expense)) {
            Flash::error('Expense not found');

            return redirect(route('crop.expenses.index'));
        }

        $this->expenseRepository->delete($id);

        Flash::success('Expense deleted successfully.');

        return redirect(route('crop.expenses.index'));
    }
}
