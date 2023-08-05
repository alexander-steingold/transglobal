<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Query\Builder as QueryBuilder;

class Customer extends Model
{
    use HasFactory;

    public static array $statuses = ['active', 'inactive'];

    protected $fillable = [
        'cid',
        'first_name',
        'last_name',
        'address',
        'zip',
        'email',
        'phone',
        'mobile',
        'pid',
        'country_id',
        'city_id',
        'status',
        'remarks',
    ];

//    public function items(): HasMany
//    {
//        return $this->hasMany(Item::class);
//    }

//    public function user(): BelongsTo
//    {
//        return $this->belongsTo(User::class);
//    }

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }


    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function scopeActive(Builder|QueryBuilder $query)
    {
        $query->where('status', '=', '1');
    }


    public function scopeFilter(Builder|QueryBuilder $query, array $filters)
    {
        $filterColumns = [
            'status' => '=',
            'city_id' => '=',
            'orders' => '=',
        ];
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

        $query->when($filters['search'] ?? null, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where('first_name', 'like', '%' . $search . '%')
                    ->orWhere('last_name', 'like', '%' . $search . '%')
                    ->orWhere('address', 'like', '%' . $search . '%')
                    ->orWhere('email', 'like', '%' . $search . '%')
                    ->orWhere('phone', 'like', '%' . $search . '%')
                    ->orWhere('mobile', 'like', '%' . $search . '%')
                    ->orWhere('pid', 'like', '%' . $search . '%')
                    ->orWhere('cid', 'like', '%' . $search . '%')
                    ->orWhere('created_at', 'like', '%' . $search . '%')
                    ->orWhere('remarks', 'like', '%' . $search . '%');
            });
        });

//        foreach (self::$features as $feature) {
//            $query->when($filters[$feature] ?? null, function ($query) use ($feature) {
//                $query->where($feature, '=', 1);
//            });
//        }
    }
}
