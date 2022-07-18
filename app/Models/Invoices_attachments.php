<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoices_attachments extends Model
{
    protected $table = "invoices_attachment";
    protected $fillable = ['file_name','invoice_number','invoice_id','Created_by'];
}
