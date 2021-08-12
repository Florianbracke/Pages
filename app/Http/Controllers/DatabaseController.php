<?php

namespace App\Http\Controllers;

use App\Models\Database;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\Console\Input\Input;
use Symfony\Component\VarDumper\Cloner\Data;

class DatabaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $databases = Database::all()->sortByDesc('TimeIfLateCalculate'); // gebruikt functie uit model

        return view('database.index', ['databases'=>$databases]);



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $database = Database::all();

        return view('database.create', ['database'=>optional($database)]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $database = new Database;
        $database->plant_name                   = $request->plant_name;
        $database->water                        = $request->water;
        $database->propogation_method           = $request->propogation_method;
        $database->light                        = $request->light;
        $database->days_until_water            = $request->days_until_water;
        $database->last_watered                 = strtotime('now');
        $database->save();
        return Redirect::to('database/');
        // return view('database.create');

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Database  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $database = Database::find($id);

        return view('database.show', ['database' => $database]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Database  $database
     * @return \Illuminate\Http\Response
     */
    public function edit(Database $database, $request)
    {


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Database  $database
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Database $database)
    {
        $database->plant_name                   = $request->plant_name;
        $database->water                        = $request->water;
        $database->propogation_method           = $request->propogation_method;
        $database->light                        = $request->light;
        $database->days_until_water             = $request->days_until_water;

        $database->save();
        return Redirect::to('database/{id}');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Database  $database
     * @return \Illuminate\Http\Response
     */
    public function destroy(Database $database)
    {
        //
    }

    public function updateTime(Database $database)
    {
        $database->last_watered = strtotime('now');
        $database->save();
        return Redirect::to('database/');
    }


}
