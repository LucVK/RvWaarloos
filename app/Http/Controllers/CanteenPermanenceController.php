<?php

namespace App\Http\Controllers;

use App\Models\Rv\CanteenPermanence;
use App\Http\Requests\StoreCanteenPermanenceRequest;
use App\Http\Requests\UpdateCanteenPermanenceRequest;
use App\Models\Rv\CanteenTeam;
use App\Models\Rv\Season;
use Carbon\Carbon;
use Inertia\Inertia;

class CanteenPermanenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Season $season = null)
    {
        $season = isset($season) ? $season : Season::firstWhere('year', Carbon::now()->format('Y'));

        $permanences = $season->canteenpermanences()->with(['department', 'canteenteam'])->get();
        // $permanences = $season->canteenpermanences()->with('canteenteam')->get();

        // $pp = $permanences->first();
        // $ctid = $pp->canteen_team_id;
        // $ppd = $pp->department;
        // $ppt = $pp->canteenteam;
        // $pps = $pp->season;
        // $ct = CanteenTeam::find($ctid);

        return Inertia::render('CanteenPermanence/Index', [
            'permanences' => $permanences,
        ]);
        //
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
     * @param  \App\Http\Requests\StoreCanteenPermanenceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCanteenPermanenceRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rv\CanteenPermanence  $canteenPermanence
     * @return \Illuminate\Http\Response
     */
    public function show(CanteenPermanence $canteenPermanence)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rv\CanteenPermanence  $canteenPermanence
     * @return \Illuminate\Http\Response
     */
    public function edit(CanteenPermanence $canteenPermanence)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCanteenPermanenceRequest  $request
     * @param  \App\Models\Rv\CanteenPermanence  $canteenPermanence
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCanteenPermanenceRequest $request, CanteenPermanence $canteenPermanence)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rv\CanteenPermanence  $canteenPermanence
     * @return \Illuminate\Http\Response
     */
    public function destroy(CanteenPermanence $canteenPermanence)
    {
        //
    }
}
