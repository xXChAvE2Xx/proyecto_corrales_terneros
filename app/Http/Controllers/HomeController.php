<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Breeding;
use App\Models\Supplier;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $breedings = Breeding::all();
        
        return view('home', ['breedings' => $breedings]);
    }

     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        if ($id == 1 || $id == 2) {
            $breedings = Breeding::select("*")->where('fat_type', $id)->get();

        }elseif ($id == 3 || $id == 4) {

            if($id == 3)
                $breedings = Breeding::select("*")->where('sick', 1)->get();
            else
                $breedings = Breeding::select("*")->where('sick', 0)->get();

        }elseif($id == 5){
            $breedings = Breeding::select("*")->where('quarantine', 1)->get();
        }

        return view('category.show', ['breedings' => $breedings, 'id' => $id]);
    }
}
