<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class City extends Model
{
    protected $fillable = [
        'name',

    ];
    use HasFactory;

    public $timestamps = false;

    public function customer(): HasMany
    {
        return $this->hasMany(Customer::class);
    }
}
