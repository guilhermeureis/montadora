<?php

namespace App\Http\Controllers;

use App\Automobile;
use App\Branch;
use App\Category;
use Illuminate\Http\Request;

class AutomobileController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $automobiles = Automobile::all();
        return view('automobiles.index', compact('automobiles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $branches = Branch::all();
        $categories = Category::all();
        return view('automobiles.create', compact('branches','categories'));
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
     * @param  \App\Automobile  $automobile
     * @return \Illuminate\Http\Response
     */
    public function show(Automobile $automobile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Automobile  $automobile
     * @return \Illuminate\Http\Response
     */
    public function edit(Automobile $automobile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Automobile  $automobile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Automobile $automobile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Automobile  $automobile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Automobile $automobile)
    {
        //
    }
}
