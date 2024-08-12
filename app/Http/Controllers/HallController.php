<?php

namespace App\Http\Controllers;

use App\Models\Hall;
use App\Http\Requests\StoreHallRequest;
use App\Http\Requests\UpdateHallRequest;

class HallController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $halls = Hall::paginate(25);
        return view('hall.index',compact('halls'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('hall.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreHallRequest $request)
    {
        Hall::create([
           'number'=>$request->number,
           'floor'=>$request->floor,
        ]);
        toastr()->success("Added successfully");
        return redirect(route('halls.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Hall $hall)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hall $hall)
    {
        return view('hall.edit',compact('hall'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHallRequest $request, Hall $hall)
    {
        $hall->update([
            'number'=>$request->number,
            'floor'=>$request->floor,
        ]);
        toastr()->success("Updated successfully");
        return redirect(route('halls.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hall $hall)
    {
        $hall->delete();
        toastr()->success("Deleted Successfully");
        return redirect(route('halls.index'));
    }
}
