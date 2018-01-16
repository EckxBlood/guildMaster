<?php
/**
 * Created by PhpStorm.
 * User: leo
 * Date: 29/12/17
 * Time: 18:26
 */

namespace App\Http\Controllers;
use App\Http\Requests;
use App\Quete;
use DateTime;
use Illuminate\Support\Facades\DB;


class QuetesController
{

    public function index()
    {
        $data = DB::table('quetes')
            ->orderby('dateFin','desc')
            ->get();

        $data2 = DB::table('membres')
            ->get();


        return view('quetes.index', ['data' => $data, 'data2' => $data2]);
    }

    public function startQuest($idMembre, $idQuest) {

        $secondBeforeEnd = DB::table('quetes')
                                ->whereId($idQuest)
                                ->select('duree')
                                ->get();

        $string = 'now +1 Hour +'.$secondBeforeEnd[0]->duree.' seconds';

        $end = date('Y-m-d H:i:s' , strtotime($string));

        DB::table('quetes')
            ->where('id', $idQuest)
            ->update(['dateFin' => $end]);

        DB::table('commencer')
            ->insert(['membre_id' => $idMembre, 'quete_id' => $idQuest]);

        $data = DB::table('quetes')
            ->orderby('dateFin','desc')
            ->get();

        return view('quetes.index', ['data' => $data]);
    }

    public function questComplete($idQuete, $idMembre) {
        DB::table('membres')
            ->whereId($idMembre)
            ->increment('niveau');

        DB::table('quetes')
            ->where('id', $idQuete)
            ->delete();

        $data = DB::table('quetes')
            ->orderby('dateFin','desc')
            ->get();

        return view('quetes.index', ['data' => $data]);
    }
}