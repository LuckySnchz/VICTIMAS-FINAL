<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Caso;

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
    public function index(Request $request){
    $casos = [];
    $demandas = [];
    $derivaciones = [];

    return view('home',compact("casos","demandas","derivaciones"));


        //$request->user()->authorizeRoles(['user', 'admin', 'profesional']);
        //Lo hago por routes


    }


 // public function detalle() {


     // }



}
