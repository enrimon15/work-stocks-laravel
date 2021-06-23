<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Company;
use App\Models\Home;
use App\Models\JobOffer;
use App\Models\News;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        try {
            $home = Home::where('active', true)->first();

            return view('home-web')
                ->with('home', $home)
                ->with('news', $this->getLatestNews())
                ->with('stats', $this->getStats())
                ->with('jobs', $this->getPolularJobs())
                ->with('companies', $this->getPopularCompany());
        } catch (\Exception $ex) {
            echo($ex);
            abort(500, 'generic error');
        }
    }

    private function getPopularCompany() {
        try {
            $companies = DB::table('job_offers')
                ->select('companies.*', 'users.avatar as avatar', DB::raw('count(*) as offers_number'))
                ->join('companies','companies.id','=','job_offers.company_id')
                ->join('users','users.id','=','companies.user_id')
                ->groupBy('companies.id')
                ->orderBy('offers_number', 'desc')
                ->limit(6)
                ->get();

            return $companies;
        } catch (\Exception $ex) {
            echo($ex);
            abort(500, 'generic error');
        }
    }

    private function getPolularJobs() {
        try {
            $jobs = DB::table('applications')
                ->select('job_offers.*', DB::raw('count(*) as number_of_applications'))
                ->join('job_offers','job_offers.id','=','applications.id_job_offer')
                ->where('due_date', '>=', Carbon::today())
                ->groupBy('id_job_offer')
                ->orderBy('number_of_applications', 'desc')
                ->limit(6)
                ->get();

            return $jobs;
        } catch (\Exception $ex) {
            echo($ex);
            abort(500, 'generic error');
        }
    }

    private function getStats() {
        try {
            $companies = Company::count();
            $users = User::whereHas(
                'roles', function($q){
                $q->where('name', 'user');
            })->count();
            $applications = Application::count();
            $jobs = JobOffer::count();

            $stats = [
                'companies' => $companies,
                'users' => $users,
                'applications' => $applications,
                'jobs' => $jobs,
            ];

            return $stats;
        } catch (\Exception $ex) {
            echo($ex);
            abort(500, 'generic error');
        }
    }

    private function getLatestNews() {
        try {
            $latest = News::orderBy('created_at', 'desc')->limit(3)->get();
            return $latest;
        } catch (\Exception $ex) {
            echo($ex);
            abort(500, 'generic error');
        }
    }

    public function searchOffers(Request $request) {
        try {
            $data = $request->validate([
                'title'=> ['nullable', 'string'],
                'location' => ['nullable', 'string']
            ]);
            $url = '/jobs?';
            if ($data['title'] != null) $url = $url . 'filter[title]=' . $data['title'] . '&';
            if ($data['location'] != null) $url = $url . 'filter[location]=' . $data['location'];

            return redirect($url);
        } catch (\Exception $ex) {
            echo($ex);
            abort(500, 'generic error');
        }
    }

    public function error() {
        return view('error/error');
    }
}
