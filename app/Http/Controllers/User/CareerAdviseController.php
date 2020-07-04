<?php

namespace App\Http\Controllers\User;

use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CareerAdviseController extends Controller
{
    public function careerAdvise()
    {
        $career = DB::table('careers')
            ->get();


    return view('user.careerAdvise', compact('career'));
    }

    public function show($id)
    {
        $career = DB::table('careers')
            ->where('careers.id','=', $id)
            ->get();

        $relatedPosts = DB::table('careers')
            ->get();

    return view('user.careerAdvisePage', compact('career', 'relatedPosts'));
    }
}
