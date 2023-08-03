<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerRequest;
use App\Models\Customer;
use App\Models\Country;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;

class CustomerController extends Controller
{

    public function index()
    {
        return redirect()->route('company.dashboard');
    }

    /**
     * Display a listing of the resource.
     */
    public function dashboard()
    {
        return view('frontend.company.dashboard');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.customer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CustomerRequest $request)
    {
        try {
            // $this->authorize('store', Customer::class);
            Customer::create($request->validated());
            return redirect()->route('admin.dashboard')->with('success', 'Business account created successfully!');
        } catch (AuthorizationException $e) {

            //return redirect()->route('company.create')->with('warning', "You don't have agency account yet, please create!");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
