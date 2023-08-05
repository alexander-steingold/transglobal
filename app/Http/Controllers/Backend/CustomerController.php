<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerRequest;
use App\Models\City;
use App\Models\Customer;
use App\Services\CustomerService;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    protected $statuses;

    public function __construct(private CustomerService $customerService)
    {
        $this->statuses = Customer::$statuses;
    }

    public function index()
    {
        $customers = $this->customerService->index();
        $cities = City::all();
        return view('backend.customer.index',
            [
                'customers' => $customers,
                'statuses' => $this->statuses,
                'cities' => $cities
            ]
        );
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cities = City::all();
        return view('backend.customer.create', ['cities' => $cities]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CustomerRequest $request)
    {
        try {
            // $this->authorize('store', Customer::class);
            Customer::create($request->validated());

        } catch (AuthorizationException $e) {

            //return redirect()->route('company.create')->with('warning', "You don't have agency account yet, please create!");
        }
        return redirect()->route('customer.index')->with('success', __('general.customer.alerts.customer_successfully_created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //$this->authorize('view', $job);
        return view('backend.customer.show', ['customer' => $customer->load('city')]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        $cities = City::all();
        return view('backend.customer.edit', ['customer' => $customer, 'cities' => $cities]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CustomerRequest $request, Customer $customer)
    {
        $customer->update($request->validated());
        return redirect()->route('customer.index')->with('success', __('general.customer.alerts.customer_successfully_updated'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
