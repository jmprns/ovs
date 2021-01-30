<?php

namespace App\Http\Controllers;

use App\Http\Requests\Election\Store;
use App\Http\Requests\Election\Update;
use App\Http\Resources\ElectionResource;
use App\Models\Election;
use Illuminate\Http\Request;

class ElectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $elections = Election::get();
        return ElectionResource::collection($elections);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Store $request)
    {
        // dd($request->validated());
        $election = Election::create($request->validated());
        return new ElectionResource($election);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Election  $election
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $election = Election::find($id);
        return new ElectionResource($election);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Election  $election
     * @return \Illuminate\Http\Response
     */
    public function update(Update $request, $id)
    {
        $election = Election::findOrFail($id);
        $election->update($request->validated());
        return new ElectionResource($election);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Election  $election
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $election = Election::findOrFail($id);
        $election->delete();
        return new ElectionResource($election);
    }
}
