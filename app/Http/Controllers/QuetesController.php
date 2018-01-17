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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class QuetesController
{

    public function index()
    {
        $data = DB::table('quetes')
            ->get();

        foreach($data as $d) {
            $commencer = DB::table("commencer")
                ->select("membre_id", "dateFin")
                ->where('quete_id', $d->id)
                ->get();

            $commencer = $commencer->all();

            if(!empty($commencer)) {
                $d->membre_id = $commencer[0]->membre_id;
                $d->dateFin = $commencer[0]->dateFin;
            } else {
                $d->membre_id = null;
                $d->dateFin = null;
            }
        }

        $data2 = DB::table('membres')
            ->join('guild', 'guild.membre_id', '=', 'membres.id')
            ->where('guild.user_id', Auth::user()->id)
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

        DB::table('commencer')
            ->insert(['membre_id' => $idMembre, 'quete_id' => $idQuest, 'dateFin' => $end]);

        $data = DB::table('quetes')
            ->get();

        foreach($data as $d) {
            $commencer = DB::table("commencer")
                ->select("membre_id", "dateFin")
                ->where('quete_id', $d->id)
                ->get();

            $commencer = $commencer->all();

            if(!empty($commencer)) {
                $d->membre_id = $commencer[0]->membre_id;
                $d->dateFin = $commencer[0]->dateFin;
            } else {
                $d->membre_id = null;
                $d->dateFin = null;
            }
        }

        $data2 = DB::table('membres')
            ->join('guild', 'guild.membre_id', '=', 'membres.id')
            ->where('guild.user_id', Auth::user()->id)
            ->get();

        return view('quetes.index', ['data' => $data, 'data2' => $data2]);
    }

    public function questComplete($idQuete, $idMembre) {
        DB::table('membres')
            ->whereId($idMembre)
            ->increment('niveau');

        DB::table('commencer')
            ->where('membre_id', $idMembre)
            ->where('quete_id', $idQuete)
            ->delete();

        $data = DB::table('quetes')
            ->get();

        foreach($data as $d) {
            $commencer = DB::table("commencer")
                ->select("membre_id", "dateFin")
                ->where('quete_id', $d->id)
                ->get();

            $commencer = $commencer->all();

            if(!empty($commencer)) {
                $d->membre_id = $commencer[0]->membre_id;
                $d->dateFin = $commencer[0]->dateFin;
            } else {
                $d->membre_id = null;
                $d->dateFin = null;
            }
        }

        $data2 = DB::table('membres')
            ->join('guild', 'guild.membre_id', '=', 'membres.id')
            ->where('guild.user_id', Auth::user()->id)
            ->get();

        return view('quetes.index', ['data' => $data, 'data2' => $data2]);
    }
}