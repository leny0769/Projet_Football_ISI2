<?php

namespace App\Http\Controllers;

use App\Models\Joueur;
use Illuminate\Http\Request;

class JoueurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $joueurs = Joueur::all();
        return view('indexJoueurs', compact('joueurs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Models\Joueur  $joueur
     * @return \Illuminate\Http\Response
     */
    public function show(Joueur $joueur)
    {
        $stats = $joueur->stats;
        return view('stats',compact('stats','joueur'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Joueur  $joueur
     * @return \Illuminate\Http\Response
     */
    public function edit(Joueur $joueur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Joueur  $joueur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Joueur $joueur)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Joueur  $joueur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Joueur $joueur)
    {
        //
    }
}
