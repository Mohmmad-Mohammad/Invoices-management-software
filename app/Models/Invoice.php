<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use SoftDeletes;
    protected $table = "invoices";
    protected $fillable = [
        'invoice_number',
        'invoice_Date',
        'due_date',
        'product',
        'section_id',
        'amount_collection',
        'amount_Commission',
        'discount',
        'value_VAT',
        'rate_VAT',
        'total',
        'status',
        'value_status',
        'note',
        'payment_Date',
    ];

    protected $dates = ['deleted_at'];

    protected function section(){
        return $this-> belongsTo('App\Models\Section','section_id','id');
        }

        public function scopeSelectExcel($query){
        return $query-> select( 'invoice_number',
            'invoice_Date',
            'due_date',
            'product',
            'section_id',
            'amount_collection',
            'amount_Commission',
            'discount',
            'value_VAT',
            'rate_VAT',
            'total',
            'status',
            'value_status',
            'note',
            'payment_date')->get();
        }
}