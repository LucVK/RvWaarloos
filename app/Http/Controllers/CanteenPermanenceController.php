<?php

namespace App\Http\Controllers;

use App\Http\Dtos\CanteenCalendarState;
use App\Models\Rv\CanteenPermanence;
use App\Http\Requests\StoreCanteenPermanenceRequest;
use App\Http\Requests\UpdateCanteenPermanenceRequest;
use App\Models\Rv\CanteenTeam;
use App\Models\Rv\Season;
use Carbon\Carbon;
use Illuminate\Support\Facades\Request;
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
        $month = Request::query('month',0);

        $state = CanteenCalendarState::from(['currentDate' => Carbon::now()]);
        if (Request::query('currentDate') != null){
            $state = CanteenCalendarState::from(Request::all());
        }

        $permanences = $season->canteenpermanences()->with(['department', 'canteenteam'])->get();

        $calendarPermanences = [];
        foreach ($permanences as $permanence) {
            $calendarPermanences[] =$permanence->jsonSerializeForCanteenCalendar();
        }

        $xxx = $state->currentDate->format("Y-m-d");

        return Inertia::render('CanteenPermanence/Index', [
            'permanences' => $calendarPermanences,
            'season' => $season->only(['year']),
            'month' => $month,
            'state' => $state
        ]);
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
