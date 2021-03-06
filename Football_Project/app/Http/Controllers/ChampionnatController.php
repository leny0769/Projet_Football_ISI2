<?php

namespace App\Http\Controllers;

use App\Models\Championnat;
use Illuminate\Http\Request;

class ChampionnatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $championnats = Championnat::all();
        return view('indexChampionnats', compact('championnats'));
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
     * @param  \App\Models\Championnat  $championnat
     * @return \Illuminate\Http\Response
     */
    public function show(Championnat $championnat)
    {
        $clubs = $championnat->clubs;
        return view('clubs',compact('clubs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Championnat  $championnat
     * @return \Illuminate\Http\Response
     */
    public function edit(Championnat $championnat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Championnat  $championnat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Championnat $championnat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Championnat  $championnat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Championnat $championnat)
    {
        //
    }
}
