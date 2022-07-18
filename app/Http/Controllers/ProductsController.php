<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductsRequest;
use App\Models\Products;
use App\Models\Sections;
use DB;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Sections = Sections::all();
        $Products = Products::all();
        return view('Products.Products',compact('Products','Sections'));
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
    public function store(ProductsRequest $request)
    {
        //        return $request;
        try {
            $Products = Products::Selection();
            if (!$Products)
                return redirect('/Products')->with(['error' => 'هذا المنتج موجود مسبقاً ']);
//            DB::beginTransaction();
            Products::create([
                'section_id'=>$request->section_id,
                'Product_name'=>$request->Product_name,
                'description'=>$request->description,
//                'Created_by'=>(Auth::user()->name),
            ]);
//            DB::commit();
            return redirect('/Products')->with(['add' => 'تم اضافة المنتج']);
        }catch (\Exception $ex){
            return $ex;
//            DB::rollback();
            return redirect('/Products')->with(['error' => 'هناك خطأ حاول فيما بعد']);

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(Products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit(Products $products)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
//        return $request;
        try {
            $section_id = Sections::where('section_name',$request->section_name)->first()->id;
            $Products = Products::findOrFail($request->id);
            $Products->update([
                'Product_name'=>$request->Product_name,
                'description'=>$request->description,
                'section_id'=>$section_id,
            ]);
            return redirect('/Products')->with(['add' => 'تم تحديث المنتج']);
        }catch (\Exception $ex){
//           return $ex;
            return redirect('/Products')->with(['error' => 'هناك خطأ حاول فيما بعد']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try {
            $Products = Products::find($request->id);
            if (!$Products)
                return redirect()->back()->with(['error' => 'هذا المنتج غير موجود او ربما يكون محذوفا ']);
            $Products->delete();
            return redirect()->back()->with(['add' => 'تم حذف المنتج']);

        }catch (\Exception $ex){
            return redirect()->back()->with(['error' => 'هناك خطأ حاول فيما بعد']);

        }
    }

}
