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
use Illuminate\Support\Facades\DB;


class QuetesController
{

    public function index()
    {
        $data = quete::all();
        return view('quetes.index', ['data' => $data]);
    }

    public function startQuest($idMembre, $idQuest) {
        DB::table('quetes')
            ->where('id', $idQuest)
            ->update(['membre_id' => $idMembre]);

        $data = quete::all();
        return view('quetes.index', ['data' => $data]);
    }

    public function questComplete($idQuest) {
        $dateFin = DB::table('quetes')
            ->select('dateFin')
            ->where('id', $idQuest)
            ->get();

        $dateActuelle = date('d/m/Y');

        if($dateFin > $dateActuelle) {
            echo "bonjour";
        } else {
            echo "dommage";
        }
    }
}