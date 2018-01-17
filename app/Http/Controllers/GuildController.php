<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GuildController extends Controller
{
    public function index()
    {

        $data = DB::table('membres')
            ->join('guild','membres.id','=', 'guild.membre_id')
            ->where('guild.user_id',Auth::user()->id)
            ->get();

        $data2 = DB::table('membres')
            ->select('membres.niveau')
            ->join('guild','membres.id','=', 'guild.membre_id')
            ->where('guild.user_id',Auth::user()->id)
            ->orderby('guild.id','desc')
            ->limit(1)
            ->get();


        return view('membres.index', ['data' => $data, 'data2' =>$data2[0]->niveau]);
    }
}
