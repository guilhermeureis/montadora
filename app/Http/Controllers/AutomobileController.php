<?php

namespace App\Http\Controllers;

use App\Automobile;
use App\Branch;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;


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

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'branch_id' => 'required',
            'name' => 'required|max:100',
            'year' => 'required',
            'model' => 'required|max:50',
            'color' => 'required|max:30',
            'chassi_number' => 'required|max:30',
            'category_id' => 'required',
        ]);
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
        $this->validator($request->all())->validate();
        $automobile = new Automobile();
        $automobile->name = $request->name;
        $automobile->year = $request->year;
        $automobile->model = $request->model;
        $automobile->color = $request->color;
        $automobile->chassi_number = $request->chassi_number;
        $automobile->branch_id = $request->branch_id;
        $automobile->category_id = $request->category_id;

        $automobile->save();

        return response()->json();
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
    public function edit($id)
    {
        $automobile = Automobile::findOrFail($id);
        $branches = Branch::all();
        $categories = Category::all();
        return view('automobiles.edit', compact('automobile','branches','categories'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Automobile  $automobile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validator($request->all())->validate();
        $automobile = Automobile::findOrFail($id);
        $automobile->name = $request->name;
        $automobile->year = $request->year;
        $automobile->model = $request->model;
        $automobile->color = $request->color;
        $automobile->chassi_number = $request->chassi_number;
        $automobile->branch_id = $request->branch_id;
        $automobile->category_id = $request->category_id;

        $automobile->save();

        return response()->json();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Automobile  $automobile
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $automobile = Automobile::findOrFail($id);
        $automobile->delete();
        return response()->json();
    }
}
