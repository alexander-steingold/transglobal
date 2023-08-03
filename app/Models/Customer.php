<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'city',
        'address',
        'zip',
        'email',
        'phone',
        'mobile',
        'pid',
        'country_id',
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
}
