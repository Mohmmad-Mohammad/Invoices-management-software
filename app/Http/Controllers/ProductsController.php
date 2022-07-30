<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductsRequest;
use App\Models\Product;
use App\Models\Section;
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
        $Sections = Section::all();
        $Products = Product::all();
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
        try {
            $Products = Product::Selection();
            if (!$Products)
                return redirect('/Products')->with(['error' => 'هذا المنتج موجود مسبقاً ']);
//            DB::beginTransaction();
            Product::create([
                'section_id'=>$request->section_id,
                'product_name'=>$request->product_name,
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
    public function show(Product $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $products)
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
        try {
            $section_id = Section::where('section_name',$request->section_name)->first()->id;
            $Products = Product::findOrFail($request->id);
            $Products->update([
                'product_name'=>$request->product_name,
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
            $Products = Product::find($request->id);
            if (!$Products)
                return redirect()->back()->with(['error' => 'هذا المنتج غير موجود او ربما يكون محذوفا ']);
            $Products->delete();
            return redirect()->back()->with(['add' => 'تم حذف المنتج']);

        }catch (\Exception $ex){
            return redirect()->back()->with(['error' => 'هناك خطأ حاول فيما بعد']);
        }
    }
}
