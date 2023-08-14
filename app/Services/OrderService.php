<?php

namespace App\Services;


use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Models\TempFile;
use Illuminate\Support\Facades\DB;


class OrderService
{
    public function __construct(private UploadService $uploadService)
    {

    }

    public function index()
    {
        $filters = request()->only(
            'search',
            'status',
            'total_payment',
            'total_payment',
            'date_range',
            'courier_id',
        );
        $orders = Order::filter($filters)
            ->with('currentStatus')
            ->with(['customer' => function ($q) {
                $q->select('id', 'first_name', 'last_name');
            }])
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        $orders->appends(request()->query());

        return $orders;
    }

    public function store(OrderRequest $request)
    {
        try {
            DB::beginTransaction();
            $order = Order::create($request->validated());
            DB::commit();


            DB::beginTransaction();
            $order->statuses()->create($request->validated());
            DB::commit();

            $tmpFiles = TempFile::all();
            if (!$tmpFiles->isEmpty()) {
                foreach ($tmpFiles as $file) {
                    if ($filePath = $this->uploadService->upload($file)) {
                        DB::beginTransaction();
                        $order->files()->create([
                            'url' => $filePath,
                            'name' => $file->file
                        ]);
                        DB::commit();
                    }
                }
            }
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

            $currentStatus = $order->currentStatus->status;
            //logger('info', [$request->validated('status')]);
            if ($currentStatus != $request->validated('status')) {
                DB::beginTransaction();
                $order->statuses()->create($request->validated());
                DB::commit();
            }
            $tmpFiles = TempFile::all();
            if (!$tmpFiles->isEmpty()) {
                foreach ($tmpFiles as $file) {
                    if ($filePath = $this->uploadService->upload($file)) {
                        DB::beginTransaction();
                        $order->files()->create([
                            'url' => $filePath,
                            'name' => $file->file
                        ]);
                        DB::commit();
                    }
                }
            }
            return true;
        } catch (\Exception $e) {
            logger('error', [$e->getMessage()]);
            DB::rollBack();
            return false;
        }
    }

    public function lastOrder()
    {
        $order = Order::lastOrder()->get();
        return $order;
    }

}
