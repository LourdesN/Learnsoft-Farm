<?php

namespace App\Http\Controllers\Crop;

use App\DataTables\Crop\CustomerDataTable;
use App\Http\Requests\Crop\CreateCustomerRequest;
use App\Http\Requests\Crop\UpdateCustomerRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\Crop\CustomerRepository;
use Illuminate\Http\Request;
use Flash;

class CustomerController extends AppBaseController
{
    /** @var CustomerRepository $customerRepository*/
    private $customerRepository;

    public function __construct(CustomerRepository $customerRepo)
    {
        $this->customerRepository = $customerRepo;
    }

    /**
     * Display a listing of the Customer.
     */
    public function index(CustomerDataTable $customerDataTable)
    {
    return $customerDataTable->render('crop.customers.index');
    }


    /**
     * Show the form for creating a new Customer.
     */
    public function create()
    {
        return view('crop.customers.create');
    }

    /**
     * Store a newly created Customer in storage.
     */
    public function store(CreateCustomerRequest $request)
    {
        $input = $request->all();

        $customer = $this->customerRepository->create($input);

        Flash::success('Customer saved successfully.');

        return redirect(route('crop.customers.index'));
    }

    /**
     * Display the specified Customer.
     */
    public function show($id)
    {
        $customer = $this->customerRepository->find($id);

        if (empty($customer)) {
            Flash::error('Customer not found');

            return redirect(route('crop.customers.index'));
        }

        return view('crop.customers.show')->with('customer', $customer);
    }

    /**
     * Show the form for editing the specified Customer.
     */
    public function edit($id)
    {
        $customer = $this->customerRepository->find($id);

        if (empty($customer)) {
            Flash::error('Customer not found');

            return redirect(route('crop.customers.index'));
        }

        return view('crop.customers.edit')->with('customer', $customer);
    }

    /**
     * Update the specified Customer in storage.
     */
    public function update($id, UpdateCustomerRequest $request)
    {
        $customer = $this->customerRepository->find($id);

        if (empty($customer)) {
            Flash::error('Customer not found');

            return redirect(route('crop.customers.index'));
        }

        $customer = $this->customerRepository->update($request->all(), $id);

        Flash::success('Customer updated successfully.');

        return redirect(route('crop.customers.index'));
    }

    /**
     * Remove the specified Customer from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $customer = $this->customerRepository->find($id);

        if (empty($customer)) {
            Flash::error('Customer not found');

            return redirect(route('crop.customers.index'));
        }

        $this->customerRepository->delete($id);

        Flash::success('Customer deleted successfully.');

        return redirect(route('crop.customers.index'));
    }
}
