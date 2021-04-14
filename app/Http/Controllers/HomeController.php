<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $data = DB::table('products')
        // //->join('roles', 'users.user_role', '=', 'roles.id')
        // ->join('status', 'products.status', '=', 'status.id')
        // ->select('products.*', 'status.desc as status')
        ->get();
        $settings= DB::table('settings') ->get();
        return view('frontend/home',compact('data','settings'));
    }
}
