<?php

namespace App\Http\Controllers;

use App\Ratio;
use Illuminate\Http\Request;

class RatioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
		$ratios = Ratio::all();
		return view('backends.ratio',compact('ratios'));
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
		//dd($request->all());
		$data = $request->all();
		Ratio::truncate();
		foreach($data['start'] as $index=>$val){ 
			Ratio::create([
				'start' => $data['start'][$index],
				'end' => $data['end'][$index],
				'ratio' => $data['ratio'][$index],
			]);
		}
		return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ratio  $ratio
     * @return \Illuminate\Http\Response
     */
    public function show(Ratio $ratio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ratio  $ratio
     * @return \Illuminate\Http\Response
     */
    public function edit(Ratio $ratio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ratio  $ratio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ratio $ratio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ratio  $ratio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ratio $ratio)
    {
        //
    }
}
