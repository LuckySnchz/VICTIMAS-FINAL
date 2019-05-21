<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Caso;
use App\Profesional;
use Illuminate\Support\Facades\Auth;
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
    $buscar=0;
    $profesionales=Profesional::all();

if(Auth::user()->hasRole('profesional')){
            $array = array();            
            foreach($profesionales as $profesional){

if($profesional->nombre_profesional_interviniente==Auth::user()->getId()){
  
  $array[]=$profesional->idCaso; 

}}
$longitud = count($array);
for($i=0; $i<$longitud; $i++){

 $casosprof[$i]=Caso::find($array[$i]);
}
 return view('home',compact("casos","demandas","derivaciones","profesional","profesionales","array","longitud","casosprof","buscar"));}
 else{
    return view('home',compact("casos","demandas","derivaciones","profesional","profesionales","buscar"));
 }
 



   


        //$request->user()->authorizeRoles(['user', 'admin', 'profesional']);
        //Lo hago por routes


    }


 // public function detalle() {


     // }



}
