<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PreinscripcionesController extends Controller
{
    /*
     * Show a list of all of the application's users.
     *
     * @return \Illuminate\Http\Response
     */
        public function index()
        {
            $users = DB::select('select * from users where active = ?', [1]);
    
            return view('user.index', ['users' => $users]);
        }

}
