<?php

namespace App\Http\Controllers;

use App\Models\Vote;
use App\Models\Candidate;
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
        $page = [
            'parent' => '',
            'child'  => '',
            'title'  => config('app.name'),
            'crumb'  => 'Dashboard'
        ];

        $candidates = Candidate::count();
        $votes = Vote::count();

        return view('home', compact('page','candidates','votes'));
    }
}
