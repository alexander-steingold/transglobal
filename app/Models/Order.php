<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Query\Builder as QueryBuilder;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'oid',
        'first_name',
        'last_name',
        'city',
        'address',
        'email',
        'phone',
        'mobile',
        'barcode',
        'prepayment',
        'payment',
        'total_payment',
        'remarks',
    ];

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(Image::class);
    }

    public function statuses(): HasMany
    {
        return $this->hasMany(OrderStatus::class);
    }

    public function currentStatus(): HasOne
    {
        return $this->hasOne(OrderStatus::class)->orderBy('id', 'desc');
    }


    public function scopeCall(Builder|QueryBuilder $query)
    {
        $query->whereHas('currentStatus', function ($query) {
            $query->where('status', '=', 'call');
        });
    }

    public function scopeFilter(Builder|QueryBuilder $query, array $filters)
    {

        logger('info', [$filters]);
        $filterColumns = [
            'total_payment' => '>=',
        ];

        $query->when($filters['status'] ?? null, function ($query, $status) {
            $query->whereHas('currentStatus', function ($query) use ($status) {
                $query->where('status', '=', $status);
            });
        });

        foreach ($filterColumns as $filter => $operator) {
            $value = $filters[$filter] ?? null;
            $query->when($value, function ($query) use ($filter, $operator, $value) {
                if (is_callable($operator)) {
                    $operator($query, $value);
                } else {
                    $query->where($filter, $operator, $value);
                }
            });
        }

        $query->when($filters['date_range'] ?? null, function ($query, $dateRange) {
            $dates = explode(__('general.to'), $dateRange);
            if (count($dates) === 2) {
                [$startDate, $endDate] = $dates;
                $query->whereDate('created_at', '>=', $startDate)
                    ->whereDate('created_at', '<=', $endDate);
            }
        });

        $query->when($filters['search'] ?? null, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where('first_name', 'like', '%' . $search . '%')
                    ->orWhere('last_name', 'like', '%' . $search . '%')
                    ->orWhere('address', 'like', '%' . $search . '%')
                    ->orWhere('email', 'like', '%' . $search . '%')
                    ->orWhere('phone', 'like', '%' . $search . '%')
                    ->orWhere('mobile', 'like', '%' . $search . '%')
                    ->orWhere('oid', 'like', '%' . $search . '%')
                    ->orWhere('created_at', 'like', '%' . $search . '%')
                    ->orWhere('barcode', 'like', '%' . $search . '%')
                    ->orWhere('remarks', 'like', '%' . $search . '%')
                    ->orWhereHas('customer', function ($query) use ($search) {
                        $query->where('first_name', 'like', '%' . $search . '%')
                            ->orWhere('last_name', 'like', '%' . $search . '%')
                            ->orWhere('address', 'like', '%' . $search . '%');
                    });
            });
        });

    }
}
