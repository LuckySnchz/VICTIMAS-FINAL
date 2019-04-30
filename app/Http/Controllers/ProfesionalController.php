<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Profesional;

use Validator;

class ProfesionalController extends Controller
{
public function agregar(Request $form){

  $hoy = date("d/m/y");
  $reglas = [
    "nombre_profesional_interviniente"=>"required|string",
    "desde_profesional_interviniente"=>"date_format:Y-m-d|before:$hoy|after:1900-01-01",
    "actual_profesional_interviniente"=>"required"
  ];

  $validator = Validator::make($form->all(), $reglas);

  $validator->sometimes('hasta_profesional_interviniente', 'required|after:desde_profesional_interviniente', function ($input) {
    return $input->actual_profesional_interviniente == 2;
  });

  if ($validator->fails()) {
      return back()
                  ->withErrors($validator)
                  ->withInput();
  }

  $profesional= new Profesional( );

  $profesional->nombre_profesional_interviniente= $form [ "nombre_profesional_interviniente"];
  $profesional->desde_profesional_interviniente= $form [ "desde_profesional_interviniente"];
  $profesional->actual_profesional_interviniente= $form [ "actual_profesional_interviniente"];
  $profesional->hasta_profesional_interviniente= $form [ "hasta_profesional_interviniente"];
  $profesional->idCaso= session("idCaso");
  $profesional->userID_create= Auth::id();

  $profesional->save( );
  return redirect ("agregarProfesional");
}


public function detalle($id) {

    $profesional = Profesional::find($id);


    $vac = compact("profesional");

    return view("detalleProfesional", $vac);
  }

  public function eliminar($id) {
    $profesional = Profesional::find($id);
    $profesional->delete();
      return redirect("agregarProfesional");

  }
  public function editar(Request $form) {
      $profesional = Profesional::find($form["idProfesional"]);
      $profesional->nombre_profesional_interviniente= $form ["nombre_profesional_interviniente"];
      $profesional->desde_profesional_interviniente= $form ["desde_profesional_interviniente"];
      $profesional->actual_profesional_interviniente= $form ["actual_profesional_interviniente"];
      $profesional->hasta_profesional_interviniente= $form ["hasta_profesional_interviniente"];
      $profesional->idCaso= $form ["idCaso"];

           $profesional->save();
            return redirect("home");}




}
