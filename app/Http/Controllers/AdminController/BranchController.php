<?php

namespace App\Http\Controllers\AdminController;

use App\Branch;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = Branch::where('user_id', auth()->user()->id)->get();
        $branchs = auth()->user()->branchs;
        return view('admin.branches.index', compact('records', 'branchs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $branchs = auth()->user()->branchs;
        $created = auth()->user()->branches()->count();
        if ($created < $branchs) {
            return view('admin.branches.create');
        } else {
            flash('لقد اضفت الحد الاقصي من الفروع')->error();
            return back();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'phone' => 'required',
            'address' => 'required',
            'address_ar' => 'required',
            'city_id'=>'required',
            'password'=>'required',
        ];
        $this->validate($request, $rules);
        $res = auth()->user()->id;

        $branch = new Branch;
        $branch->phone = $request->phone;
        $branch->address = $request->address;
        $branch->address_ar = $request->address_ar;
        $branch->city_id = $request->city_id;
           $branch->user_id = $res;
        $branch->password = bcrypt($request->password);
      $branch->save();
        flash('تم اضافة الفرع');
        return redirect()->route('branches.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function show(Branch $branch)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function edit(Branch $branch)
    {
        return view('admin.branches.edit', compact('branch'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Branch $branch)
    {
        $rules = [
            'phone' => 'required',
            'address' => 'required',
            'address_ar' => 'required',
            'password' => 'required',
              'city_id' => 'required',
        ];
        $this->validate($request, $rules);
        $res = auth()->user();
        $branch->update($request->all());
        $branch->password = bcrypt($request->password);
        $branch->save();
        flash('تم تعديل الفرع');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $branch = Branch::find($id);
        $branch->delete();
        flash('تم الحذف بنجاح');
        return back();
    }
}
