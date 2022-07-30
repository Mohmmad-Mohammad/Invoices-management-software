<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoices_detail extends Model
{
    protected $table = "invoices_details";
    protected $fillable = [
        'id_Invoice',
        'invoice_number',
        'product',
        'sections',
        'status',
        'value_status',
        'note',
        'user',
        'payment_date',
    ];

}
