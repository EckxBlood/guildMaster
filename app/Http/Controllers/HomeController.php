<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nbMembre = DB::table('guild')
            ->select('id')
            ->where('user_id',Auth::user()->id)
            ->get();

        if (empty($nbMembre[0]))
        {
            DB::table('guild')->insert(
                ['user_id' => Auth::user()->id, 'membre_id' => '1']
            );
        }

        return view('home');
    }
}
