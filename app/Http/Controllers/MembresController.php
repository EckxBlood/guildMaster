<?php
/**
 * Created by PhpStorm.
 * User: leo
 * Date: 29/12/17
 * Time: 18:25
 */

namespace App\Http\Controllers;
use App\Membre;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;



class MembresController
{

    public function index()
    {
        $data = DB::table('membres as m')
            ->select('m.*', 'g.attaque', 'g.defense', 'g.niveau')
            ->join('guild as g', 'g.membre_id','=', 'm.id')
            ->get();

        $data2 = DB::table('guild as g')
            ->select('niveau')
            ->where('user_id', Auth::user()->id)
            ->orderby('id','desc')
            ->limit(1)
            ->get();

        return view('membres.index', ['data' => $data, 'data2' =>$data2[0]->niveau]);
    }

    public function add(){

        DB::table('membres')->insert(
            ['name' => 'test', 'description' => 'test']
        );

        $idMembre = DB::table('membres')
            ->select('id')
            ->orderby('id', 'desc')
            ->limit(1)
            ->get();

        DB::table('guild')
            ->insert(
                ['user_id' => Auth::user()->id, 'membre_id' => $idMembre[0]->id, 'attaque' => 1, 'defense' => 1, 'niveau' => 1]
            );

        $data = DB::table('membres as m')
            ->select('m.*', 'g.attaque', 'g.defense', 'g.niveau')
            ->join('guild as g', 'g.membre_id','=', 'm.id')
            ->get();

        $data2 = DB::table('guild as g')
            ->select('niveau')
            ->where('user_id', Auth::user()->id)
            ->orderby('id','desc')
            ->limit(1)
            ->get();

        return view('membres.index', ['data' => $data, 'data2' =>$data2[0]->niveau]);
    }
}