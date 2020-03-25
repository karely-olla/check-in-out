<?php

namespace App\Http\Controllers;

use App\Models\HourExtra;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class HourExtraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.hours_extras.index');
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
     * @param  \App\Models\HourExtra  $hourExtra
     * @return \Illuminate\Http\Response
     */
    public function show(HourExtra $hourExtra)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HourExtra  $hourExtra
     * @return \Illuminate\Http\Response
     */
    public function edit(HourExtra $hourExtra)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HourExtra  $hourExtra
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HourExtra $hourExtra)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HourExtra  $hourExtra
     * @return \Illuminate\Http\Response
     */
    public function destroy(HourExtra $hourExtra)
    {
        //
    }

    public function table()
    {
        $hours_extras=HourExtra::all();
        return DataTables::of($hours_extras)
            ->addColumn('employe', function($hours_extras){
                return $hours_extras->employe->name;
            })
            ->make(true);
    }
}
