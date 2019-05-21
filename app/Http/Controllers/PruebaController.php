<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Caso;
use App\Profesional;
use Illuminate\Support\Facades\Auth;
class PruebaController extends Controller
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
    $casos = Caso::all();
    $demandas = [];
    $derivaciones = [];
$profesionales=Profesional::all();





            $array = array();            
    foreach($profesionales as $profesional){

if($profesional->nombre_profesional_interviniente==Auth::user()->getId()){
  $array[]=$profesional->idCaso;
  

}}
$longitud = count($array);
/*for($i=0; $i<$longitud; $i++){

 $caso=Caso::find($array[$i]);
}
*/
 
for($i=0; $i<$longitud; $i++){
$array[$i];
}
  




    return view('prueba',compact("casos","demandas","derivaciones","profesionales","profesionales","array","longitud","caso"));


        //$request->user()->authorizeRoles(['user', 'admin', 'profesional']);
        //Lo hago por routes


    }


 // public function detalle() {


     // }



}
