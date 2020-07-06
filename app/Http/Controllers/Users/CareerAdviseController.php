<?php

namespace App\Http\Controllers\Users;

use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CareerAdviseController extends Controller
{
    public function careerAdvise()
    {
        $career = DB::table('careers')
            ->get();


    return view('users.careerAdvise', compact('career'));
    }

    public function show($id)
    {
        $career = DB::table('careers')
            ->where('careers.id','=', $id)
            ->get();

        $relatedPosts = DB::table('careers')
            ->get();

    return view('users.careerAdvisePage', compact('career', 'relatedPosts'));
    }
}
