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
        'Due_date',
        'product',
        'section_id',
        'Amount_collection',
        'Amount_Commission',
        'Discount',
        'Value_VAT',
        'Rate_VAT',
        'Total',
        'Status',
        'Value_Status',
        'note',
        'Payment_Date',
    ];

    protected $dates = ['deleted_at'];

    protected function section(){
        return $this-> belongsTo('App\Models\Section','section_id','id');
        }

        public function scopeSelectExcel($query){
        return $query-> select( 'invoice_number',
            'invoice_Date',
            'Due_date',
            'product',
            'section_id',
            'Amount_collection',
            'Amount_Commission',
            'Discount',
            'Value_VAT',
            'Rate_VAT',
            'Total',
            'Status',
            'Value_Status',
            'note',
            'Payment_Date')->get();
        }
}
