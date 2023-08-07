<?php

namespace App\Services;


use App\Http\Requests\OrderRequest;
use App\Models\Order;
use Illuminate\Support\Facades\DB;


class OrderService
{
    public function index()
    {
        $filters = request()->only(
            'search',
            'status',
            'total_payment',
            'total_payment',
            'date_range'
        );
        $orders = Order:: latest()
            // ->with('company', 'firstImage')
            ->filter($filters)
            ->with('currentStatus')
            ->with(['customer' => function ($q) {
                $q->select('id', 'first_name', 'last_name');
            }])
            ->paginate(10);
        $orders->appends(request()->query());

        return $orders;
    }

    public function store(OrderRequest $request)
    {
        try {
            DB::beginTransaction();
            Order::create($request->validated());
            DB::commit();
            return true;
        } catch (\Exception $e) {
            logger('error', [$e->getMessage()]);
            DB::rollBack();
            return false;
        }
    }

    public function update(OrderRequest $request, Order $order)
    {
        try {
            DB::beginTransaction();
            $order->update($request->validated());
            DB::commit();
            return true;
        } catch (\Exception $e) {
            logger('error', [$e->getMessage()]);
            DB::rollBack();
            return false;
        }
    }

}
