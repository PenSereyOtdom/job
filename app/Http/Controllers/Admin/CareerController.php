<?php

namespace App\Http\Controllers\Admin;

use DB;
use File;
use App\Career;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class CareerController extends Controller
{
    public function index(Request $request)
    {
        $admin_id = Auth::guard('admin')->user()->id;
        $career = DB::table('careers')
            ->where('admin_id', '=', $admin_id)
            ->get();
        return view('admin.career', compact('career'));
    }
    public function create()
    {
        $admin_id = Auth::guard('admin')->user()->id;
        return view('admin.createCareer', compact('admin_id'));
    }

    public function store(Request $request)
    {


        $career = new Career();
        $career->admin_id = Auth::guard('admin')->user()->id;
        $career->title = $request->input('title');
        $career->content = $request->input('content');

        if ($request->hasFile('cover')) {
            $filenameWithExt = $request->file('cover')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('cover')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $path = $request->file('cover')->storeAs('cover', $fileNameToStore);
            $career->cover = $fileNameToStore;
        }else{
            return $request;
            $career->cover=' ';
        }
        $career->save();
        return redirect('/career');

    }

    public function edit($id)
    {
        $editCareer = Career::find($id);
        return view('admin.editCareer')->with('editCareer', $editCareer);
    }

    public function update(Request $request, $id)
    {
        $career = Career::find($id);
        $career->title = $request->get('title');
        $career->content = $request->get('content');
        $career->update();
        return redirect('/career')->with('editCareer', $career);
    }

    public function destroy($id)
    {
        $career = Career::find($id);
        $admin_id = Auth::guard('admin')->user()->id;

        $career->delete();
        return redirect('/career');
    }

}
