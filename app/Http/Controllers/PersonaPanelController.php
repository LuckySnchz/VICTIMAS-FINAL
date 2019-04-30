<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Persona;
use Validator;

class PersonaPanelController extends Controller
{
public function editar(Request $form){


$reglas = [
  "nombre_persona_asistida"=>'required|min:3|max:255|regex:/^([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/',
  "vinculo_persona_asistida"=>"required",
  "telefono_persona_asistida"=>"required|integer|digits_between:1,30",
  "domicilio_persona_asistida"=>"required|min:3|max:255|regex:/^([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/",
  "localidad_persona_asistida"=>"required|min:3|max:255|regex:/^([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/"];

$validator = Validator::make($form->all(), $reglas);

$validator->sometimes('otro_vinculo_persona_asistida_cual', 'required|min:3|max:255|regex:/^([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/', function ($input) {
  return $input->vinculo_persona_asistida == 4;
        });

if ($validator->fails()) {
    return back()
                ->withErrors($validator)
                ->withInput();
}

$persona = Persona::find($form["idPersona"]);
$persona->nombre_persona_asistida= $form ["nombre_persona_asistida"];
$persona->vinculo_persona_asistida= $form ["vinculo_persona_asistida"];
$persona->otro_vinculo_persona_asistida_cual= $form ["otro_vinculo_persona_asistida_cual"];
$persona->telefono_persona_asistida= $form ["telefono_persona_asistida"];
$persona->domicilio_persona_asistida= $form ["domicilio_persona_asistida"];
$persona->localidad_persona_asistida= $form ["localidad_persona_asistida"];
$persona->idCaso= session("idCaso");
$persona->userID_modify= Auth::id();




$persona->save();

      return redirect("paneldecontrol/{$persona->idCaso}");
}


public function detalle($id) {

    $persona = Persona::find($id);
    $personas = Persona::all();
  session(["idPersona" => $id]);
$nombre_persona_asistida=$persona->nombre_persona_asistida;
$vinculo_persona_asistida=$persona->vinculo_persona_asistida;
$otro_vinculo_persona_asistida_cual=$persona->otro_vinculo_persona_asistida_cual;
$telefono_persona_asistida=$persona->telefono_persona_asistida;
$domicilio_persona_asistida=$persona->domicilio_persona_asistida;
$localidad_persona_asistida=$persona->localidad_persona_asistida;


    return view("detallePersona", compact("persona","personas","nombre_persona_asistida","vinculo_persona_asistida","otro_vinculo_persona_asistida_cual","telefono_persona_asistida","domicilio_persona_asistida","localidad_persona_asistida"));
  }

  public function eliminar($id) {
    $persona = Persona::find($id);
    $persona->delete();

 return redirect("paneldecontrol/{$persona->idCaso}");

  }


  public function agregar(Request $form){

/*$reglas = [
"nombre_persona_asistida"=>"required|min:3|max:255|regex:/^([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/",
"vinculo_persona_asistida"=>"required",
"telefono_persona_asistida"=>"required|integer|digits_between:1,30",
"domicilio_persona_asistida"=>"required|min:3|max:255|regex:/^([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/",
"localidad_persona_asistida"=>"required|min:3|max:255|regex:/^([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/"
  ];

$validator = Validator::make($form->all(), $reglas);

$validator->sometimes('otro_vinculo_persona_asistida_cual', 'required|min:3|max:255|regex:/^([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/', function ($input) {        return $input->vinculo_persona_asistida == 4;
        });

if ($validator->fails()) {
    return back()
                ->withErrors($validator)
                ->withInput();
}*/

$persona= new Persona();

$persona->nombre_persona_asistida= $form ["nombre_persona_asistida"];
$persona->otro_vinculo_persona_asistida_cual= $form ["otro_vinculo_persona_asistida_cual"];
$persona->telefono_persona_asistida= $form ["telefono_persona_asistida"];
$persona->domicilio_persona_asistida= $form ["domicilio_persona_asistida"];
$persona->localidad_persona_asistida= $form ["localidad_persona_asistida"];
$persona->idCaso= session("idCaso");
$persona->userID_create= Auth::id();
$persona->idVictim= session("idVictim");


$persona->save();


$persona->victims()->attach($form ["idVictim"], array("vinculo_persona_asistida"=> $form ["vinculo_persona_asistida"]));



 return redirect("paneldecontrol/{$persona->idCaso}");
}

 }
