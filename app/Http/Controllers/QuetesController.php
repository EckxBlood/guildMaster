<?php
/**
 * Created by PhpStorm.
 * User: leo
 * Date: 29/12/17
 * Time: 18:26
 */

namespace App\Http\Controllers;


class QuetesController
{

    public function index()
    {
        return view('membres/index.blade.php');
    }

}