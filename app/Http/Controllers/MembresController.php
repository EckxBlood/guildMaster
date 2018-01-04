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


class MembresController
{

    public function index()
    {
        $data = membre::all();
        return view('membres.index', ['data' => $data]);
    }

    public function startQuest($idQuest, $duree) {

    }
}