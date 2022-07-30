<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = [
        'description',
        'product_name',
        'section_id',
        'created_at',
        'updated_at',

    ];

    public function scopeSelection($query){
        return $query ->select( 'id',
            'description',
            'product_name',
            'section_id'

        );
    }

    public function sections(){
        return $this-> belongsTo('App\Models\Section','section_id','id');
    }
}