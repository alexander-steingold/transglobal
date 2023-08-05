<?php

namespace App\Services;

use App\Models\Customer;

class CustomerService
{
    public function index()
    {
        $filters = request()->only(
            'search',
            'status',
            'city_id'
        );
        $customers = Customer:: latest()
            // ->with('company', 'firstImage')
            ->filter($filters)
            ->paginate(10);

        $customers->appends(request()->query());
        return $customers;
    }
    
}
