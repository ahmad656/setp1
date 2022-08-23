<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    public function country(){
        return $this->belongsTo(Country::class , 'country_id' , 'id');
    }

    // public static function boot()
    // {
    //     parent::boot();    
    
    //     // cause a delete of a product to cascade to children so they are also deleted
    //     static::deleted(function($cities)
    //     {
    //         $cities->country_id()->delete();
    //     });
    // }
}
