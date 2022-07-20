<?php

namespace App\Http\Controllers;

use App\Models\Invoices_attachment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvoicesAttachmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        try {
        $this->validate($request, [
            'file_name' => 'mimes:pdf,jpeg,png,jpg',
        ], [
            'file_name.mimes' => 'صيغة المرفق يجب ان تكون   pdf, jpeg , png , jpg',
        ]);
        $image = $request->file('file_name');
        $file_name = $image->getClientOriginalName();
            Invoices_attachment::create([
            'file_name'=>$file_name,
            'invoice_number'=>$request->invoice_number,
            'invoice_id'=>$request->invoice_id,
            'Created_by'=>(Auth::user()->name),
        ])->update();
        $imageName = $request->file_name->getClientOriginalName();
        $request->file_name->move(public_path('Attachments/'. $request->invoice_number), $imageName);
            return redirect()->back()->with(['add' => 'تم اضافة المرفق']);
        }catch (\Exception $ex){
            return redirect()->back()->with(['error' => 'هناك خطأ حاول فيما بعد']);

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Invoices_attachments  $invoices_attachments
     * @return \Illuminate\Http\Response
     */
    public function show(Invoices_attachment $invoices_attachments)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Invoices_attachments  $invoices_attachments
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoices_attachment $invoices_attachments)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Invoices_attachments  $invoices_attachments
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoices_attachment $invoices_attachments)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Invoices_attachments  $invoices_attachments
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoices_attachment $invoices_attachments)
    {
        //
    }
}
