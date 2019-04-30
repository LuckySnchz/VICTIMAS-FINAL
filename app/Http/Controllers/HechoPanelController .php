<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Hecho;
use App\Provincia;
use App\Ciudad;
use Validator;
class HechoPanelController extends Controller
{
  public function editar(Request $form){

  $reglas = [
      "caratulacion_judicial"=>"required|max:100",
      "fecha_hecho"=>"required|before:tomorrow",
      "pais_hecho"=>"required",
      "provincia_hecho"=>"required",
      "localidad_hecho"=>"required"
    ];

  $this->validate($form,$reglas);

  $hecho = Hecho::find($form["idDelito"]);
  $hecho->caratulacion_judicial= $form ["caratulacion_judicial"];
  $hecho->fecha_hecho= $form ["fecha_hecho"];
  $hecho->pais_hecho= $form ["pais_hecho"];
  $hecho->provincia_hecho= $form ["provincia_hecho"];
  $hecho->localidad_hecho= $form ["localidad_hecho"];
  $hecho->idCaso= $form["idCaso"];
        $hecho->userID_create= $form["userID_create"];
        $hecho->userID_modify= Auth::id();


        $hecho->save( );

        return redirect("paneldecontrol/{$hecho->idCaso}");


  }
  public function detalle($id) {
      $hecho= Hecho::find($id);
      $hechos= Hecho::All();
      $provincias = Provincia::all();
      $ciudades = Ciudad::all();
      session(["idDelito" => $id]);
      $caratulacion_judicial=$hecho->caratulacion_judicial;
      $fecha_hecho=$hecho->fecha_hecho;
      $provincia_hecho= $hecho->provincia_hecho;
      $localidad_hecho= $hecho->localidad_hecho;
      $pais_hecho= $hecho->pais_hecho;


      return view("detalleDelito",compact("hecho","hechos","provincias","ciudades","caratulacion_judicial",
      "fecha_hecho","provincia_hecho","localidad_hecho","pais_hecho"));
      }
}
