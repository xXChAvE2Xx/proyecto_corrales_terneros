<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Corral;
use App\Models\Breeding;

class QuarantineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $corrals = Corral::all();
        $breeding = Breeding::find($id);

        return view('quarantine.index', ['corrals'=>$corrals, 'breeding'=> $breeding]);
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
            'quarantine'=> 'required|numeric',
            'corral'=> 'required'
        ],
        [
            'quarantine.required' => 'El campo cuarentena es obligatorio.',
            'corral.required' => 'El campo corral es obligatorio.'
        ]);

        $breeding = Breeding::find($id);

        $breeding->quarantine = $request->quarantine;
        $breeding->id_corral = $request->corral;
        $breeding->save();

        return redirect()->route('breeding.show',['id' => $breeding->id])->with('success', 'Se movió la cría');

    }
}
