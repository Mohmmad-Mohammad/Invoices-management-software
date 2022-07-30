<?php

namespace App\Http\Controllers;

use App\Http\Requests\SectionsRequest;
use App\Models\Section;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class SectionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *

     */
    public function index()
    {
        $Sections = Section::Selection()->paginate(10);
        return view('sections.Sections',compact('Sections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SectionsRequest $request)
    {

        try {
            $sectione = Section::Selection();
            if (!$sectione)
            return redirect()->back()->with(['error' => 'هذا القسم موجود مسبقاً ']);
            DB::beginTransaction();
            Section::create([
            'section_name'=>$request->section_name,
            'description'=>$request->description,
            'created_by'=>(Auth::user()->name),
        ]);
            DB::commit();
            return redirect()->back()->with(['add' => 'تم اضافة القسم']);
        }catch (\Exception $ex){
//            return $ex;
            DB::rollback();
            return redirect()->back()->with(['error' => 'هناك خطأ حاول فيما بعد']);

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sections  $sections
     * @return \Illuminate\Http\Response
     */
    public function show(Section $sections)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sections  $sections
     * @return \Illuminate\Http\Response
     */
    public function edit(Section $sections)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sections  $sections
     * @return \Illuminate\Http\Response
     */
    public function update(SectionsRequest $request)
    {
        try {
            $id = $request->id;

            $sections = Section::Select('id','section_name','description')->find($id);
            $sections->update([
                    'section_name' => $request->section_name,
                    'description' => $request->description,
                    'edit_at'=>$request->edit_at,
                ]);
            return redirect()->back()->with(['add' => 'تم تحديث القسم']);
        }catch (\Exception $ex){
            return redirect()->back()->with(['error' => 'هناك خطأ حاول فيما بعد']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sections  $sections
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try {
            $id = $request->id;
            $sections = Section::Selection()->find($id);
            if (!$sections)
                return redirect()->back()->with(['error' => 'هذا القسم غير موجود او ربما يكون محذوفا ']);
            Section::find($id)->delete();
            return redirect()->back()->with(['add' => 'تم حذف القسم']);

        }catch (\Exception $ex){
            return $ex;
            return redirect()->back()->with(['error' => 'هناك خطأ حاول فيما بعد']);

        }
    }
}