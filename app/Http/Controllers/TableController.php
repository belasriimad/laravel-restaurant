<?php

namespace App\Http\Controllers;

use App\Table;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class TableController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view("managments.tables.index")->with([
            "tables" => Table::paginate(5)
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
        return view("managments.tables.create");
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
        //validation
        $this->validate($request, [
            "name" => "required|unique:tables,name",
            "status" => "required|boolean"
        ]);
        //store data
        $name = $request->name;
        Table::create([
            "name" => $name,
            "slug" => Str::slug($name),
            "status" => $request->status,
        ]);
        //redirect user
        return redirect()->route("tables.index")->with([
            "success" => "table ajoutée avec succés"
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Table  $table
     * @return \Illuminate\Http\Response
     */
    public function show(Table $table)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Table  $table
     * @return \Illuminate\Http\Response
     */
    public function edit(Table $table)
    {
        //
        return view("managments.tables.edit")->with([
            "table" => $table
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Table  $table
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Table $table)
    {
        //
        //validation
        $this->validate($request, [
            "name" => "required|unique:tables,name," . $table->id,
            "status" => "required|boolean"
        ]);
        //store data
        $name = $request->name;
        $table->update([
            "name" => $name,
            "slug" => Str::slug($name),
            "status" => $request->status,
        ]);
        //redirect user
        return redirect()->route("tables.index")->with([
            "success" => "table modifiée avec succés"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Table  $table
     * @return \Illuminate\Http\Response
     */
    public function destroy(Table $table)
    {
        //
        $table->delete();
        //redirect user
        return redirect()->route("tables.index")->with([
            "success" => "table supprimée avec succés"
        ]);
    }
}
