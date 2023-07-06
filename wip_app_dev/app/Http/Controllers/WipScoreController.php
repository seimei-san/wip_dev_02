<?php

namespace App\Http\Controllers;

use App\Models\WipScore;
use Illuminate\Http\Request;

class WipScoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $wip_scores = WipScore::orderBy('user_id', 'asc')->get();
        return view('wip_scores', ['wip_scores' => $wip_scores]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(WipScore $wipScore)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WipScore $wipScore)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, WipScore $wipScore)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WipScore $wipScore)
    {
        //
    }
}
