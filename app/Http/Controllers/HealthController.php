<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Health;
use App\Models\Breeding;

class HealthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        return view('health.index',['id' => $id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $request->validate([
            'temperature'=> 'required|numeric',
            'heart_frecuency'=> 'required|numeric',
            'breathing_rate' => 'required|numeric',
            'blood_pressure' => 'required|numeric',
        ],
        [
            'temperature.required' => 'El campo de la temperatura es obligatorio.',
            'heart_frecuency.required' => 'El campo de la frecuencia cardiaca es obligatorio.',
            'breathing_rate.required' => 'El campo de la frecuencia respiratoria es obligatorio.',
            'blood_pressure.required' => 'El campo de la frecuencia sanguínea es obligatorio.'
        ]); 

        $health = new Health;
        $breeding = new Breeding;
        $sick = NULL;

        $health->temperature = $request->temperature;
        $health->heart_frecuency = $request->heart_frecuency;
        $health->breathing_rate = $request->breathing_rate;
        $health->blood_pressure = $request->blood_pressure;
        $health->id_breedings = $id;
        $health->save();

        //Validamos si la cria se encuentra sana o no.
        if(($request->temperature >= 37.5 && $request->temperature <= 39.5) && 
            ($request->heart_frecuency >= 70 && $request->heart_frecuency <= 80) && 
            ($request->breathing_rate >= 15 && $request->breathing_rate <= 20) && 
            ($request->blood_pressure >= 8 && $request->blood_pressure <= 10)){

            $sick = 0;
        }else{
            $sick = 1;
        }

        $breeding = Breeding::find($id);
        $breeding->sick = $sick;
        $breeding->save();

        return redirect()->route('breeding.show', ['id' => $id])->with('success','Se agregaron los datos del sensor de manera exitosa.');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $health = Health::firstWhere('id_breedings', $id);

        return view('health.edit', ['id' => $id, 'health' => $health]);
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
            'temperature'=> 'required|numeric',
            'heart_frecuency'=> 'required|numeric',
            'breathing_rate' => 'required|numeric',
            'blood_pressure' => 'required|numeric',
        ],
        [
            'temperature.required' => 'El campo de la temperatura es obligatorio.',
            'heart_frecuency.required' => 'El campo de la frecuencia cardiaca es obligatorio.',
            'breathing_rate.required' => 'El campo de la frecuencia respiratoria es obligatorio.',
            'blood_pressure.required' => 'El campo de la frecuencia sanguínea es obligatorio.'
        ]); 

        $health = Health::firstWhere('id_breedings', $id);

        $health->temperature = $request->temperature;
        $health->heart_frecuency = $request->heart_frecuency;
        $health->breathing_rate = $request->breathing_rate;
        $health->blood_pressure = $request->blood_pressure;
        $health->id_breedings = $id;
        $health->save();

        //Validamos si la cria se encuentra sana o no.
        if(($request->temperature >= 37.5 && $request->temperature <= 39.5) && 
            ($request->heart_frecuency >= 70 && $request->heart_frecuency <= 80) && 
            ($request->breathing_rate >= 15 && $request->breathing_rate <= 20) && 
            ($request->blood_pressure >= 8 && $request->blood_pressure <= 10)){

            $sick = 0;
        }else{
            $sick = 1;
        }

        $breeding = Breeding::find($id);
        $breeding->sick = $sick;
        $breeding->save();

        return redirect()->route('breeding.show', ['id' => $id])->with('success','Se actualizó los datos del sensor de manera exitosa.');
    }
}
