<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Breeding;
use App\Models\Position;


class BreedingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $positions = Position::all();

        return view('breeding.index', ['positions' => $positions]);
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
        $request->validate([
            'peso'=> 'required|numeric',
            'costo'=> 'required|numeric',
            'color_musculo' => 'required',
            'marmoleo' => 'required',
            'descripcion'=> 'required',
            'proveedor' => 'required'

        ]);

        $breeding = new Breeding;

        $breeding->weight = $request->peso;
        $breeding->cost = $request->costo;
        $breeding->description = $request->descripcion;
        $breeding->color_muscle = $request->marmoleo;
        $breeding->marbling = $request->color_musculo;
        $breeding->id_supplier = $request->proveedor;

        $breeding->save();

        return redirect()->route('breeding.index')->with('success','Se agrego la cria correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
