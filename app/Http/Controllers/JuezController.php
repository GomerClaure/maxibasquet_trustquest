<?php

namespace App\Http\Controllers;

use App\Models\Juez;
use App\Models\Pais;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JuezController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $paises = DB::table('paises')
                ->orderBy('Nacionalidad', 'asc')
                ->get();

        return view('juez.create',compact('paises'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Juez  $juez
     * @return \Illuminate\Http\Response
     */
    public function show(Juez $juez)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Juez  $juez
     * @return \Illuminate\Http\Response
     */
    public function edit(Juez $juez)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Juez  $juez
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Juez $juez)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Juez  $juez
     * @return \Illuminate\Http\Response
     */
    public function destroy(Juez $juez)
    {
        //
    }
}
