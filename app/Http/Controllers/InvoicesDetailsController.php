<?php

namespace App\Http\Controllers;

use App\Models\Invoices;
use App\Models\Invoices_attachments;
use App\Models\Invoices_details;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InvoicesDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $invoices = Invoices::where('id',$id)->first();
        $details = Invoices_details::where('id_Invoice',$id)->get();
        $attachments = Invoices_attachments::where('invoice_id',$id)->get();
        return view('invoices.invoicesDetails',compact('invoices','attachments','details'));
    }


    public function Openfile($invoice_number,$file_name){
        $files = Storage::disk('attachments')->getDriver()->getAdapter()->applyPathPrefix($invoice_number.'/'.$file_name);
        return response()->file($files);
    }


    public function Downloadfile($invoice_number,$file_name){
        $files = Storage::disk('attachments')->getDriver()->getAdapter()->applyPathPrefix($invoice_number.'/'.$file_name);
        return response()->download($files);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Invoices_details  $invoices_details
     * @return \Illuminate\Http\Response
     */
    public function show(Invoices_details $invoices_details)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Invoices_details  $invoices_details
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoices_details $invoices_details)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Invoices_details  $invoices_details
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoices_details $invoices_details)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Invoices_details  $invoices_details
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try {
            $invoices = Invoices_attachments::findOrFail($request->id_file);
            $invoices->delete();
            Storage::disk('attachments')->delete($request->invoice_number.'/'.$request->file_name);
            session()->flash('delete', 'تم حذف المرفق بنجاح');

            return back();
//            return redirect('/details/{id}')->with(['add' => 'تم حذف مرفقات الفاتورة']);

        }catch (\Exception $ex){

            return redirect('/details/{id}')->with(['error' => 'هناك خطأ حاول فيما بعد']);

        }
    }
}
