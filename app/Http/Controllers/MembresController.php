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
use Illuminate\Support\Facades\DB;



class MembresController
{

    public function index()
    {
        $data = membre::all();

        $data2 = DB::table('membres')
            ->select('niveau')
            ->orderby('id','desc')
            ->limit(1)
            ->get();

        return view('membres.index', ['data' => $data, 'data2' =>$data2[0]->niveau]);
    }

    public function add(){
        DB::table('membres')->insert(
            ['name' => 'test', 'description' => 'test' , 'attaque' => 10, 'defense' => 10, 'niveau'=>1]
        );

        $data = membre::all();

        $data2 = DB::table('membres')
            ->select('niveau')
            ->orderby('id','desc')
            ->limit(1)
            ->get();

        return view('membres.index', ['data' => $data, 'data2' =>$data2[0]->niveau]);
    }
}