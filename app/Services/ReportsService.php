<?php

namespace App\Services;

use App\Enums\OrderStatuses;
use App\Models\Courier;
use App\Models\Customer;
use App\Models\Order;
use App\Models\TempFile;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class ReportsService
{

    public function ordersByStatus()
    {
        $allStatuses = OrderStatuses::keyLabels();
// Fetch the counts for each status
        $statusCounts = Order::with('statuses')
            ->select('order_statuses.status', DB::raw('count(*) as count'))
            ->rightJoin('order_statuses', 'orders.id', '=', 'order_statuses.order_id')
            ->groupBy('order_statuses.status')
            ->get();

// Create an associative array with default counts of 0
        $defaultStatusCounts = array_fill_keys($allStatuses, 0);

// Merge the fetched counts with the default counts
        $statusCountsMerged = array_merge($defaultStatusCounts, $statusCounts->pluck('count', 'status')->toArray());
        return $statusCountsMerged;
    }

    public function getTotals()
    {
        $totalOrders = Order::count();
        $totalCustomers = Customer::count();
        $totalCouriers = Courier::count();
        $totals = [
            'totalOrders' => $totalOrders,
            'totalCustomers' => $totalCustomers,
            'totalCouriers' => $totalCouriers
        ];
        return $totals;
    }

    public function getTotalPayments()
    {
        $payments = Order::sum('total_payment');
        return $payments;
    }

    public function getThreeMonthsPayments()
    {
        $threeMonthsAgo = Carbon::now()->subMonths(2);

        $monthlyPayments = Order::select(DB::raw('YEAR(created_at) as year, MONTH(created_at) as month, SUM(total_payment) as total_payment'))
            ->where('created_at', '>=', $threeMonthsAgo)
            ->groupBy(DB::raw('YEAR(created_at), MONTH(created_at)'))
            ->orderBy(DB::raw('YEAR(created_at), MONTH(created_at)'))
            ->get();

        $monthlyPaymentsWithMonthNames = [];
        foreach ($monthlyPayments as $monthlyPayment) {
            $yearMonth = Carbon::createFromDate($monthlyPayment->year, $monthlyPayment->month)->format('Y-m');
            $monthName = Carbon::createFromDate($monthlyPayment->year, $monthlyPayment->month)->format('m/Y');

            $monthlyPaymentsWithMonthNames[] = [
                'month_name' => $monthName,
                'total_payment' => $monthlyPayment->total_payment,
            ];
        }
        return $monthlyPaymentsWithMonthNames;
    }
}
