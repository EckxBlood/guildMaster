<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuildController extends Controller
{
    public function index()
    {
        return view('membres.index');
    }
}
