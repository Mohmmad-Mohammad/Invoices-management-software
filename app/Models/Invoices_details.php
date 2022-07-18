<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoices_details extends Model
{
    protected $table = "invoices_details";
    protected $fillable = [
        'id_Invoice',
        'invoice_number',
        'product',
        'Sections',
        'Status',
        'Value_Status',
        'note',
        'user',
        'Payment_Date',
    ];

}
