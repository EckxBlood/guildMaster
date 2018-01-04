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


class QuetesController
{

    public function index()
    {
        $data = quete::all();
        return view('quetes.index', ['data' => $data]);
    }

    public function startQuest($idMembre, $idQuest) {
        quete::table('quetes')
            ->where('id', $idQuest)
            ->update(['membre_id' => $idMembre]);

        $data = quete::all();
        return view('quetes.index', ['data' => $data]);
    }

    public function questComplete() {

    }
}