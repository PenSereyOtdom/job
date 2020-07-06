<?php

namespace App\Http\Controllers\Users;

use DB;
use App\Models\JobPost;
use App\Models\Company;
use App\Models\SaveJob;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class JobsController extends Controller
{
    public function quickSearch(Request $request,$search_key)
    {
        $jobs = DB::table('job_posts')
        ->where('status', '=', 'Active')
        ->where('closing_date', '>=', date('Y-m-d'))
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
        $user_id = Auth::id();
        $saves = SaveJob::where('user_id', '=', $user_id)
        ->get();  

        $count_jobs = count($jobs);
        $count_saves = count($saves);
        // dd($search_keywords);

        return view('users.jobs', compact('jobs', 'search_keywords','count_jobs','saves'));

    }
    public function jobs(Request $request)
    {
       
        $location = isset($_GET['location']) ? $_GET['location'] : NULL ;
        $search = isset($_GET['search']) ? $_GET['search'] : NULL ;
        $job_classification = isset($_GET['job_classification']) ? $_GET['job_classification'] : NULL ;
        $job_industry = isset($_GET['job_industry']) ? $_GET['job_industry'] : NULL ;
        $job_type = isset($_GET['job_type']) ? $_GET['job_type'] : NULL ;
        $salary = isset($_GET['salary']) ? $_GET['salary'] : NULL ;
        $experience_level = isset($_GET['experience_level']) ? $_GET['experience_level'] : NULL ;
        $user_id = Auth::id();

        $saves = SaveJob::where('user_id', '=', $user_id)
        ->get();
            

        $jobs = DB::table('job_posts')
            ->where('status', '=', 'Active')
            ->where('closing_date', '>=', date('Y-m-d'))
            ->join('companies', 'job_posts.company_id', '=', 'companies.id')
            ->select('companies.name as name',
                    'companies.company_profile as profile',
                    'job_posts.*'
        )
        ->where(
            function ($query) use($location,$job_classification,$job_industry,$job_type,$salary,$experience_level ) {

                if($location != NULL) {
                    $query->where('location', 'like', '%'.$location.'%');
                }

                if($job_classification != NULL ){
                    foreach($job_classification as $job) {
                        $query->where('job_classification', 'like',  '%' . $job.'%');
                    }
                }

                if($job_industry != NULL){
                    foreach($job_industry as $job) {
                        $query->where('job_industry', 'like',  '%' . $job.'%');
                    }
                }

                if($job_type != NULL){
                    foreach($job_type as $job) {
                        $query->where('job_type', 'like',  '%' . $job.'%');
                    }
                }

                if($job_industry != NULL){
                    foreach($job_industry as $job) {
                        $query->where('job_industry', 'like',  '%' . $job.'%');
                    }
                }

                if( $salary != NULL){
                    foreach($salary as $job) {
                        $query->where('salary', 'like',  '%' . $job.'%');
                    }
                }


                if($experience_level != NULL){
                    foreach($experience_level as $job) {
                        $query->where('experience_level', 'like',  '%' . $job.'%');
                    }
                }

               
            }
        )
        ->where(
            function ($query) use($search) {
                if($search != NULL) {
                    $query->orWhere('job_title', 'like',  '%' .$search.'%');
                    $query->orWhere('name', 'like',  '%' .$search.'%');
                }  
            }
        )
        ->orderBy('created_at', 'desc')
        ->paginate(10);
        $count_jobs = count($jobs);
        $count_saves = count($saves);
        
        
        return view('users.jobs', compact('jobs','count_jobs','saves','count_saves'));

    }

    public function hotjobs(Request $request)
    {
        
        $location = isset($_GET['location']) ? $_GET['location'] : NULL ;
        $search = isset($_GET['search']) ? $_GET['search'] : NULL ;
        $job_classification = isset($_GET['job_classification']) ? $_GET['job_classification'] : NULL ;
        $job_industry = isset($_GET['job_industry']) ? $_GET['job_industry'] : NULL ;
        $job_type = isset($_GET['job_type']) ? $_GET['job_type'] : NULL ;
        $salary = isset($_GET['salary']) ? $_GET['salary'] : NULL ;
        $experience_level = isset($_GET['experience_level']) ? $_GET['experience_level'] : NULL ;
        $user_id = Auth::id();

        $saves = SaveJob::where('user_id', '=', $user_id)
        ->get();
            

        $jobs = DB::table('job_posts')
            ->where('status', '=', 'Active')
            ->where('closing_date', '>=', date('Y-m-d'))
            ->join('companies', 'job_posts.company_id', '=', 'companies.id')
            ->select('companies.name as name',
                    'companies.company_profile as profile',
                    'job_posts.*'
        )
        ->where(
            function ($query) use($location,$job_classification,$job_industry,$job_type,$salary,$experience_level ) {

                if($location != NULL) {
                    $query->where('location', 'like', '%'.$location.'%');
                }

                if($job_classification != NULL ){
                    foreach($job_classification as $job) {
                        $query->where('job_classification', 'like',  '%' . $job.'%');
                    }
                }

                if($job_industry != NULL){
                    foreach($job_industry as $job) {
                        $query->where('job_industry', 'like',  '%' . $job.'%');
                    }
                }

                if($job_type != NULL){
                    foreach($job_type as $job) {
                        $query->where('job_type', 'like',  '%' . $job.'%');
                    }
                }

                if($job_industry != NULL){
                    foreach($job_industry as $job) {
                        $query->where('job_industry', 'like',  '%' . $job.'%');
                    }
                }

                if( $salary != NULL){
                    foreach($salary as $job) {
                        $query->where('salary', 'like',  '%' . $job.'%');
                    }
                }


                if($experience_level != NULL){
                    foreach($experience_level as $job) {
                        $query->where('experience_level', 'like',  '%' . $job.'%');
                    }
                }

               
            }
        )
        ->where(
            function ($query) use($search) {
                if($search != NULL) {
                    $query->orWhere('job_title', 'like',  '%' .$search.'%');
                    $query->orWhere('name', 'like',  '%' .$search.'%');
                }  
            }
        )
        ->orderBy('created_at', 'desc')
        ->paginate(10);
        $count_jobs = count($jobs);
        $count_saves = count($saves);
    
        return view('users.hotjobs', compact('jobs','count_jobs','saves','count_saves'));

    }


}
