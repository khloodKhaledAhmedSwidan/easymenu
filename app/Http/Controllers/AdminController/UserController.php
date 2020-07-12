<?php

namespace App\Http\Controllers\AdminController;

use App\City;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;
use Auth;

use Image;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id', 'desc')->get();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            // 'phone_number'          => 'required|unique:users',
            'name'                  => 'required|max:255',
            'name_ar'               => 'required|max:255',
            'branchs'               => 'required',
            'email'                 => 'required|unique:users',
            'image'                 => 'nullable|mimes:jpeg,bmp,png,jpg|max:5000',
            'password'              => 'required|string|min:6',
            'password_confirmation' => 'required|same:password',
            'active'                => 'nullable',
        ]);

        $user = User::create([
            'name_ar'         => $request->name_ar,
            'name'            => $request->name,
            'email'           => $request->email,
            'branchs'         => $request->branchs,
            'active'          => $request->active,
            'password'        => Hash::make($request->password),
            'image'           => $request->file('image') == null ? 'default.png' : UploadImage($request->file('image'), 'image', '/uploads/users'),
        ]);

        return redirect('admin/users');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'email'        => 'required|email|unique:users,email,' . $id,
            'name'         => 'required|max:255',
            'name_ar'         => 'required|max:255',
            'branchs'         => 'required',
            'image'        => 'nullable|mimes:jpeg,bmp,png,jpg|max:5000',
        ]);
        $users = User::find($id);
        User::where('id', $id)->first()->update([
            'email'            => $request->email,
            'name'             => $request->name,
            'branchs'          => $request->branchs,
            'name_ar'          => $request->name_ar,
            'image'            => $request->file('image') == null ? $users->image : UploadImage($request->file('image'), 'image', '/uploads/users'),
        ]);
        flash('تم تعديل بيانات المطعم');
        return back();
    }

    public function update_pass(Request $request, $id)
    {
        //
        $this->validate($request, [
            'password' => 'required|string|min:6|confirmed',
        ]);
        $users = User::findOrfail($id);
        $users->password = Hash::make($request->password);
        $users->save();
        flash('تم تعديل كلمة مرور المطعم');
        return redirect()->back();
    }

    public function update_privacy(Request $request, $id)
    {
        if ($request->ajax()) {
            $user = User::findOrfail($id);
            $user->active = !$user->active;
            $user->save();
            return 'true';
        }

        $this->validate($request, [
            'active' => 'required',
        ]);
        $users = User::findOrfail($id);
        $users->active = $request->active;
        $users->save();
        flash('تم تعديل اعدادات المطعم');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users = User::find($id);
        $users->delete();
        flash('تم حذف المطعم');
        return back();
    }
}
