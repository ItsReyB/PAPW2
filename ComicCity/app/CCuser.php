<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CCuser extends Model
{
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('active', function ($query) {
            $query->where('c_cusers.active', true);
        });
    }
}
