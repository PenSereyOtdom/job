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
        $career = new Career([
            'admin_id' => Auth::guard('admin')->user()->id,
            'title'    => $request->get('title'),
            'content'    => $request->get('content'),
        ]);
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

    public function uploadImage(Request $request) {
        $CKEditor = $request->input('CKEditor');
        $funcNum  = $request->input('CKEditorFuncNum');
        $message  = $url = '';
        if (Input::hasFile('upload')) {
            $file = Input::file('upload');
            if ($file->isValid()) {
                $filename =rand(1000,9999).$file->getClientOriginalName();
                $file->move(public_path().'/img/', $filename);
                $url = url('img/' . $filename);
            } else {
                $message = 'An error occurred while uploading the file.';
            }
        } else {
            $message = 'No file uploaded.';
        }
        return '<script>window.parent.CKEDITOR.tools.callFunction('.$funcNum.', "'.$url.'", "'.$message.'")</script>';
    }

}
