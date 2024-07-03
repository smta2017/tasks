<?php

namespace App\Http\Controllers;

use App\Models\Task;
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
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        // \DB::select('select assigned_to ,count(assigned_to) from tasks group by assigned_to');
        $tasks = Task::select('assigned_to', \DB::raw('count(assigned_to) as count'))
            ->groupBy('assigned_to')
            ->orderByDesc('count')
            ->get();
        // $tasks = Task::get();
        return view('home', compact('tasks'));
    }
}
