<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //it's ok to mass assign name, email...
    // protected $fillable = [
    //     'name', 'email', 'active'
    // ];

    //Guarded Example: empty array nothing to be guarded (mass assignments to everything)
    protected $guarded = [];

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

    public function scopeInactive($query)
    {
        return $query->where('active', 0);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
