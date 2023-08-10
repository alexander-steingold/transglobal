<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Enums\OrderStatuses;
use App\Http\Requests\OrderRequest;
use App\Models\City;
use App\Models\Country;
use App\Models\Courier;
use App\Models\Customer;
use App\Models\Order;
use App\Services\OrderService;

class OrderController extends Controller
{

    protected $statuses;

    public function __construct(private OrderService $orderService)
    {
        $this->statuses = OrderStatuses::keyLabels();
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = $this->orderService->index();

        $cities = City::all();
        return view('backend.order.index',
            [
                'orders' => $orders,
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
        $countries = Country::all();
        $customers = Customer::active()
            ->orderBy('first_name', 'asc')
            ->orderBy('last_name', 'asc')
            ->get();
        $couriers = Courier::active()->get();
        return view('backend.order.create', [
            'countries' => $countries,
            'customers' => $customers,
            'couriers' => $couriers,
            'statuses' => $this->statuses,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OrderRequest $request)
    {
        //return $request;
        if ($this->orderService->store($request) === true) {
            return redirect()->route('order.index')->with('success', __('general.order.alerts.order_successfully_created'));
        } else {
            return redirect()->route('order.index')->with('error', __('general.alerts.operation_failed'));
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        return view('backend.order.show', ['order' => $order->load([
            'customer',
            'courier',
            'country',
            'statuses'
        ])
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        $countries = Country::all();
        $customers = Customer::orderBy('first_name', 'asc')
            ->orderBy('last_name', 'asc')
            ->get();
        $couriers = Courier::orderBy('first_name', 'asc')
            ->orderBy('last_name', 'asc')
            ->get();
        return view('backend.order.edit', [
            'countries' => $countries,
            'customers' => $customers,
            'couriers' => $couriers,
            'statuses' => $this->statuses,
            'order' => $order->load('currentStatus')

        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OrderRequest $request, Order $order)
    {
        if ($this->orderService->update($request, $order) === true) {
            return redirect()->route('order.index')->with('success', __('general.order.alerts.order_successfully_updated'));
        } else {
            return redirect()->route('order.index')->with('error', __('general.alerts.operation_failed'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
