<?php

namespace App\Http\Controllers;

use App\Models\Period;
use App\Http\Requests\StorePeriodRequest;
use App\Http\Requests\UpdatePeriodRequest;

class PeriodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $periods = Period::paginate(25);
        return view('period.index',compact('periods'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('period.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePeriodRequest $request)
    {
        Period::create([
            'strating_time'=>$request->strating_time,
            'finishing_time'=>$request->finishing_time,
        ]);
        toastr()->success("Added successfully");
        return redirect(route('periods.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Period $period)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Period $period)
    {
        return view('period.edit',compact('period'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePeriodRequest $request, Period $period)
    {
        $period->update([
            'strating_time'=>$request->strating_time,
            'finishing_time'=>$request->finishing_time,
        ]);
        toastr()->success("Updated successfully");
        return redirect(route('periods.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Period $period)
    {
        $period->delete();
        toastr()->success("Deleted Successfully");
        return redirect(route('periods.index'));
    }
}
