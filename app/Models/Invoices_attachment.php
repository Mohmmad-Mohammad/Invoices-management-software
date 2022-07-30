<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoices_attachment extends Model
{
    protected $table = "invoices_attachments";
    protected $fillable = ['file_name','invoice_number','invoice_id','created_by'];
}