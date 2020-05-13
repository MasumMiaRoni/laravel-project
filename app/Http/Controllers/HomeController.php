<?php

namespace App\Http\Controllers;

use App\Charts\UserChart;
use App\User;
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
        $this->middleware(['UserRole','auth']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $today_users = User::whereDate('created_at', today())->count();
        $yesterday_users = User::whereDate('created_at', today()->subDays(1))->count();
        $users_2_days_ago = User::whereDate('created_at', today()->subDays(2))->count();
        $users_3_days_ago = User::whereDate('created_at', today()->subDays(3))->count();

        $chart = new UserChart;
        $chart->labels(['2 days ago', 'Yesterday', 'Today','3 days ago']);
        $chart->dataset('Users', 'pie', [$users_2_days_ago, $yesterday_users, $today_users,$users_3_days_ago])->options([
            'color' => ['#02c0ce','green','blue','orange'],
        ]);


        return view('backend.dashboard',compact('chart'));
    }
}
