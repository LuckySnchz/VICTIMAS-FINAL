<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Hecho;

class HechoController extends Controller
{
  public function agregar(Request $form){
  $hoy = date("d/m/y");
  $reglas = [
      "fecha_delito"=>"required",
      "pais_hecho"=>"required",
      "provincia_hecho"=>"required",
      "localidad_hecho"=>"required"
    ];

    $validator = Validator::make($form->all(), $reglas);

    $validator->sometimes('fecha_hecho', "required|before:$hoy", function ($input) {
      return $input->fecha_delito == 1;
    });

    $validator->sometimes('fecha_hecho_otro', "required|min:3|max:100|regex:/^([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/", function ($input) {
      return $input->fecha_delito == 2;
    });

    if ($validator->fails()) {
        return back()
                    ->withErrors($validator)
                    ->withInput();
    }

    

  $hecho= new Hecho( );
  $hecho->fecha_delito= $form ["fecha_delito"];
  $hecho->fecha_hecho= $form ["fecha_hecho"];
  $hecho->fecha_hecho_otro  = $form ["fecha_hecho_otro"];
  $hecho->pais_hecho= $form ["pais_hecho"];
  $hecho->provincia_hecho= $form ["provincia_hecho"];
  $hecho->localidad_hecho= $form ["localidad_hecho"];
  $hecho->idCaso= session("idCaso");
  $hecho->userID_create= Auth::id();



  $hecho->save( );

  return redirect ("agregarimputado");


  }
}
