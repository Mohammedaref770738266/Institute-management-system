<?php

namespace App\Http\Controllers;

use App\Models\Term;
use App\Http\Requests\StoreTermRequest;
use App\Http\Requests\UpdateTermRequest;

class TermController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $terms = Term::paginate(25);
        return view('term.index',compact('terms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('term.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTermRequest $request)
    {
        Term::create([
            'starting_date'=>$request->starting_date,
            'finishing_date'=>$request->finishing_date,
        ]);
        toastr()->success("Added successfully");
        return redirect(route('terms.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Term $term)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Term $term)
    {
        return view('term.edit',compact('term'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTermRequest $request, Term $term)
    {
        $term->update([
            'starting_date'=>$request->starting_date,
            'finishing_date'=>$request->finishing_date,
            'finished'=>$request->finished
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Term $term)
    {
        $term->delete();
        toastr()->success("Deleted Successfully");
        return redirect(route('terms.index'));
    }
}
