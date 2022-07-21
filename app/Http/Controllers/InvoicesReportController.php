<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;

class InvoicesReportController extends Controller
{
    public function index()
    {
            return view('reports.invoices_report');
        }

        public function Search_invoices(Request $request)
        {
        $rdio = $request->rdio;
        // في حالة البحث بنوع الفاتورة
        if ($rdio == 1) {
        // في حالة عدم تحديد تاريخ
            if ($request->type && $request->start_at =='' && $request->end_at =='') {
                $invoices = Invoice::select('*')->where('Status','=',$request->type)->get();
                $type = $request->type;
                return view('reports.invoices_report',compact('type'))->withDetails($invoices);
            } else {
        // في حالة تحديد تاريخ استحقاق
                $start_at = date($request->start_at);
                $end_at = date($request->end_at);
                $type = $request->type;
                $invoices = Invoice::whereBetween('invoice_Date',[$start_at,$end_at])->where('Status','=',$request->type)->get();
                return view('reports.invoices_report',compact('type','start_at','end_at'))->withDetails($invoices);
            }
        } else {
        // في البحث برقم الفاتورة
            $invoices = Invoice::select('*')->where('invoice_number','=',$request->invoice_number)->get();
            return view('reports.invoices_report')->withDetails($invoices);
        }
    }
}
