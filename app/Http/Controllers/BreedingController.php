<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Breeding;
use App\Models\Supplier;
use App\Models\Health;
use App\Models\Corral;


class BreedingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supplies = Supplier::all();

        return view('breeding.index', ['supplies' => $supplies]);
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
            'descripcion'=> 'required|min:6|max:255',
            'proveedor' => 'required'
        ],
        [
            'peso.required' => 'El campo peso es obligatorio.',
            'costo.required' => 'El campo costo es obligatorio.',
            'color_musculo.required' => 'El campo color del musculo es obligatorio.',
            'marmoleo.required' => 'El campo marmoleo es obligatorio.',
            'descripcion.required' => 'El campo descripción es obligatorio.',
            'proveedor.required' => 'El campo proveedor es obligatorio.',
            'descripcion.max' => 'La descripción no debe superar los 255 caracteres.',
            'descripcion.min' => 'La descripción debe tener al menos 6 caracteres.'
            
        ]);

        $breeding = new Breeding;
        $fat_type = 0;

        if(($request->peso >= 15 && $request->peso <= 25) && 
        ($request->color_musculo >= 3 && $request->color_musculo <= 5) && 
        ($request->marmoleo == 1 || $request->marmoleo == 2)){
            $fat_type = 1;
        }else{
            $fat_type = 2;
        }

        
        $breeding->weight = $request->peso;
        $breeding->cost = $request->costo;
        $breeding->description = $request->descripcion;
        $breeding->color_muscle = $request->color_musculo;
        $breeding->marbling = $request->marmoleo;
        $breeding->id_supplier = $request->proveedor;
        $breeding->fat_type = $fat_type;

        $breeding->save();

        return redirect()->route('breeding.index')->with('success','Se agregó la cría correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $breeding = Breeding::find($id);
        $supplie = Supplier::find($breeding->id_supplier);
        $health = Health::firstWhere('id_breedings', $id);
        $corral = Corral::find($breeding->id_corral);

        return view('breeding.show', ['breeding' => $breeding, 'supplie' => $supplie, 'health' => $health, 'corral' => $corral]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $breeding = Breeding::find($id);
        $supplies = Supplier::all();

        return view('breeding.edit', ['breeding' => $breeding, 'supplies' => $supplies]);
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
        $request->validate([
            'peso'=> 'required|numeric',
            'costo'=> 'required|numeric',
            'color_musculo' => 'required',
            'marmoleo' => 'required',
            'descripcion'=> 'required|min:6|max:255',
            'proveedor' => 'required'
        ],
        [
            'peso.required' => 'El campo peso es obligatorio.',
            'costo.required' => 'El campo costo es obligatorio.',
            'color_musculo.required' => 'El campo color del musculo es obligatorio.',
            'marmoleo.required' => 'El campo marmoleo es obligatorio.',
            'descripcion.required' => 'El campo descripción es obligatorio.',
            'proveedor.required' => 'El campo proveedor es obligatorio.',
            'descripcion.max' => 'La descripción no debe superar los 255 caracteres.',
            'descripcion.min' => 'La descripción debe tener al menos 6 caracteres.'
        ]);

        $breeding = Breeding::find($id);
        $fat_type = 0;

        if(($request->peso >= 15 && $request->peso <= 25) && 
        ($request->color_musculo >= 3 && $request->color_musculo <= 5) && 
        ($request->marmoleo == 1 || $request->marmoleo == 2)){
            $fat_type = 1;
        }else{
            $fat_type = 2;
        }

        $breeding->weight = $request->peso;
        $breeding->cost = $request->costo;
        $breeding->description = $request->descripcion;
        $breeding->color_muscle = $request->color_musculo;
        $breeding->marbling = $request->marmoleo;
        $breeding->id_supplier = $request->proveedor;
        $breeding->fat_type = $fat_type;

        $breeding->save();

        return redirect()->route('breeding.show', ['id' => $id])->with('success', 'Cría actualizada con éxito.');

    }

}
