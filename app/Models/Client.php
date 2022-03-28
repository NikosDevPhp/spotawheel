<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Client extends Model
{
    /**
     * The attributes that are guarded.
     *
     * @var array<int, string>
     */
    protected $guarded = ['id'];


    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class, 'user_id');
    }

    public function latestPayment(): HasOne
    {
        return $this->hasOne(Payment::class, 'user_id')->latestOfMany('updated_at');
    }

}
