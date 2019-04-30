<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Auth;
use App\Demanda;
use App\Provincia;
use App\Ciudad;
use App\Delito;
use App\Organismo;
use App\Departamento;
use App\CAVAJ;
use App\Caso;

class DemandaController extends Controller
{

public function agregar(Request $form){

$hoy = date("d/m/y");
$reglas = [

"fecha_ingreso" => "date_format:Y-m-d|before:$hoy|after:1900-01-01",
"delito" => "required",
"modalidad_ingreso" => "required",
"pais_hecho"=>"required",
"provincia_hecho"=>"required",
"localidad_hecho"=>"required",
"nombre_y_apellido_de_la_victima"=> "required|min:3|max:255|regex:/^([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/"

      ];

  $validator = Validator::make($form->all(), $reglas);

  $validator->sometimes('organismo', 'required', function ($input) {
  return $input->modalidad_ingreso == 3;
    });

  $validator->sometimes('otro_organismo', "required|min:3|max:255|regex:/^([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/", function ($input) {
  return $input->organismo == 24;
    });

  $validator->sometimes('otro_delito', "required|min:3|max:255|regex:/^([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/", function ($input) {
  return $input->delito == 73;
    });


  if ($validator->fails()) {
      return back()
          ->withErrors($validator)
          ->withInput();
          }

  $user = Auth::user();

  $demanda= new Demanda();

  $demanda->fecha_ingreso= $form["fecha_ingreso"];
  $demanda->nombre_y_apellido_de_la_victima=$form["nombre_y_apellido_de_la_victima"];
  $demanda->delito= $form["delito"];
  $demanda->otro_delito= $form["otro_delito"];
  $demanda->pais_hecho= $form ["pais_hecho"];
  $demanda->provincia_hecho= $form ["provincia_hecho"];
  $demanda->localidad_hecho= $form ["localidad_hecho"];
  $demanda->modalidad_ingreso= $form["modalidad_ingreso"];
  $demanda->organismo= $form["organismo"];
  $demanda->otro_organismo= $form["otro_organismo"];
  $demanda->activo= 1;
  $demanda->userID_create= Auth::id();
  $demanda->sede=$user->getSede();

  $demanda->save();
  $idDemanda = $demanda->id;

  session(["idDemanda" => $idDemanda]);


  return redirect("home");

  }

  public function eliminar($id) {
    $demanda = DEMANDA::find($id);
    $demanda->desactivar();


    return redirect("home");
  }



        public function PasarACaso($id){

        $DemandaACaso = Demanda::find($id);
        $DemandaACaso->desactivar();


          $user = Auth::user();
          $caso= new Caso();
          $caso->fecha_ingreso= $DemandaACaso->fecha_ingreso;
          $caso->delito= $DemandaACaso->delito;
          $caso->otro_delito= $DemandaACaso->otro_delito;
          $caso->modalidad_ingreso= $DemandaACaso->modalidad_ingreso;
          $caso->organismo= $DemandaACaso->organismo;
          $caso->cual_otro_organismo= $DemandaACaso->otro_organismo;
          $caso->nombre_y_apellido_de_la_victima= $DemandaACaso->nombre_y_apellido_de_la_victima;
          $caso->pais_hecho= $DemandaACaso->pais_hecho;
          $caso->provincia_hecho= $DemandaACaso->provincia_hecho;
          $caso->localidad_hecho= $DemandaACaso->localidad_hecho;
          $caso->activo=1;
          $caso->userID_create= Auth::id();
          $caso->sede=$user->getSede();
          $caso->save();

          $idCaso = $caso->id;

          session(["idCaso" => $idCaso]);

              return redirect("/detalleCaso/$idCaso");


}}
