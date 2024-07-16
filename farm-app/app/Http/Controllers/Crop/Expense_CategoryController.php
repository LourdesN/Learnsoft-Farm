<?php

namespace App\Http\Controllers\Crop;

use App\DataTables\Crop\Expense_CategoryDataTable;
use App\Http\Requests\Crop\CreateExpense_CategoryRequest;
use App\Http\Requests\Crop\UpdateExpense_CategoryRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\Crop\Expense_CategoryRepository;
use Illuminate\Http\Request;
use Flash;

class Expense_CategoryController extends AppBaseController
{
    /** @var Expense_CategoryRepository $expenseCategoryRepository*/
    private $expenseCategoryRepository;

    public function __construct(Expense_CategoryRepository $expenseCategoryRepo)
    {
        $this->expenseCategoryRepository = $expenseCategoryRepo;
    }

    /**
     * Display a listing of the Expense_Category.
     */
    public function index(Expense_CategoryDataTable $expenseCategoryDataTable)
    {
    return $expenseCategoryDataTable->render('crop.expense__categories.index');
    }


    /**
     * Show the form for creating a new Expense_Category.
     */
    public function create()
    {
        return view('crop.expense__categories.create');
    }

    /**
     * Store a newly created Expense_Category in storage.
     */
    public function store(CreateExpense_CategoryRequest $request)
    {
        $input = $request->all();

        $expenseCategory = $this->expenseCategoryRepository->create($input);

        Flash::success('Expense  Category saved successfully.');

        return redirect(route('crop.expenseCategories.index'));
    }

    /**
     * Display the specified Expense_Category.
     */
    public function show($id)
    {
        $expenseCategory = $this->expenseCategoryRepository->find($id);

        if (empty($expenseCategory)) {
            Flash::error('Expense  Category not found');

            return redirect(route('crop.expenseCategories.index'));
        }

        return view('crop.expense__categories.show')->with('expenseCategory', $expenseCategory);
    }

    /**
     * Show the form for editing the specified Expense_Category.
     */
    public function edit($id)
    {
        $expenseCategory = $this->expenseCategoryRepository->find($id);

        if (empty($expenseCategory)) {
            Flash::error('Expense  Category not found');

            return redirect(route('crop.expenseCategories.index'));
        }

        return view('crop.expense__categories.edit')->with('expenseCategory', $expenseCategory);
    }

    /**
     * Update the specified Expense_Category in storage.
     */
    public function update($id, UpdateExpense_CategoryRequest $request)
    {
        $expenseCategory = $this->expenseCategoryRepository->find($id);

        if (empty($expenseCategory)) {
            Flash::error('Expense  Category not found');

            return redirect(route('crop.expenseCategories.index'));
        }

        $expenseCategory = $this->expenseCategoryRepository->update($request->all(), $id);

        Flash::success('Expense  Category updated successfully.');

        return redirect(route('crop.expenseCategories.index'));
    }

    /**
     * Remove the specified Expense_Category from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $expenseCategory = $this->expenseCategoryRepository->find($id);

        if (empty($expenseCategory)) {
            Flash::error('Expense  Category not found');

            return redirect(route('crop.expenseCategories.index'));
        }

        $this->expenseCategoryRepository->delete($id);

        Flash::success('Expense  Category deleted successfully.');

        return redirect(route('crop.expenseCategories.index'));
    }
}
