<?php

namespace App\Http\Controllers\User;

use DB;
use App\JobPost;
use App\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JobsController extends Controller
{
    public function quickSearch(Request $request,$search_key)
    {
        $jobs = DB::table('job_posts')
        ->where('status', '=', 'Active')
        ->join('companies', 'job_posts.company_id', '=', 'companies.id')
        ->select('companies.name as name',
                'companies.company_profile as profile',
                'job_posts.*'
        )
        ->where(
            function ($query) use($search_key) {
                $query->orWhere('job_classification', 'like',  '%' . $search_key .'%');
                $query->orWhere('job_type', 'like',  '%' . $search_key .'%');
                $query->orWhere('salary', 'like',  '%' . $search_key .'%');
                $query->orWhere('location', 'like', '%'.$search_key.'%');
            }
        )
        ->orderBy('created_at', 'desc')
        ->paginate(10);
         

        $count_jobs = count($jobs);
        // dd($search_keywords);

        return view('user.jobs', compact('jobs', 'search_keywords','count_jobs'));

    }



    public function jobs(Request $request)
    {
        
        $location = isset($_POST['location']) ? $_POST['location'] : NULL ;
        $search = isset($_POST['search']) ? $_POST['search'] : NULL ;
        $job_classification = isset($_POST['job_classification']) ? $_POST['job_classification'] : NULL ;
        $job_industry = isset($_POST['job_industry']) ? $_POST['job_industry'] : NULL ;
        $job_type = isset($_POST['job_type']) ? $_POST['job_type'] : NULL ;
        $salary = isset($_POST['salary']) ? $_POST['salary'] : NULL ;
        $experience_level = isset($_POST['experience_level']) ? $_POST['experience_level'] : NULL ;

  

        if($request->isMethod('post')){
            $jobs = DB::table('job_posts')
            ->where('status', '=', 'Active')
            ->join('companies', 'job_posts.company_id', '=', 'companies.id')
            ->select('companies.name as name',
                    'companies.company_profile as profile',
                    'job_posts.*'
            )
            ->where(
                function ($query) use($location,$search ,$job_classification,$job_industry,$job_type,$salary,$experience_level ) {
                    $query->where('job_title', 'like',  '%' . $search.'%');
                    $query->where('job_classification', 'like',  '%' . $job_classification.'%');
                    $query->where('job_industry', 'like',  '%' . $job_industry .'%');
                    $query->where('job_type', 'like',  '%' . $job_type .'%');
                    $query->where('salary', 'like',  '%' . $salary .'%');
                    $query->where('experience_level', 'like',  '%' . $experience_level  .'%');
                    $query->where('location', 'like', '%'.$location.'%');
                }
            )
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        } else {
            $jobs = DB::table('job_posts')
            ->where('status', '=', 'Active')
            ->join('companies', 'job_posts.company_id', '=', 'companies.id')
            ->select('companies.name as name',
                    'companies.company_profile as profile',
                    'job_posts.*'
            )
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        }

        $count_jobs = count($jobs);

        return view('user.jobs', compact('jobs','count_jobs'));

    }
}
