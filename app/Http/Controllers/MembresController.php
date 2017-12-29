<?php
/**
 * Created by PhpStorm.
 * User: leo
 * Date: 29/12/17
 * Time: 18:25
 */

namespace App\Http\Controllers;


class MembresController
{

    public function index()
    {
        return view('membres.index');
    }

}