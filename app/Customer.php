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

    // To set default for a model
    protected $attributes = [
        'active' => 1
    ];
    public function getActiveAttribute($attribute)
    {
        // return [
        //     0 => 'Inactive',
        //     1 => 'Active',
        // ][$attribute];

        return $this->activeOptions()[$attribute];
    }

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

    public function activeOptions()
    {
        return [
            0 => 'Inactive',
            1 => 'Active',
        ];
    }
}
