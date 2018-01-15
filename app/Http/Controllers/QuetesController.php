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
        return view('quetes.index', ['data' => $data]);
    }

    public function startQuest($idMembre, $idQuest) {

        $end = date('Y-m-d H:i:s' , strtotime('now +1 Hour +20 seconds'));

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

    public function questComplete($idMembre) {
        DB::table('membres')
            ->whereId($idMembre)
            ->increment('niveau');

        $data = DB::table('quetes')
            ->orderby('dateFin','desc')
            ->get();

        return view('quetes.index', ['data' => $data]);
    }
}