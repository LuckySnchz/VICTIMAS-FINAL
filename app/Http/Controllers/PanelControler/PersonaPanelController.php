<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Persona;
use App\Persona_nueva;
use Validator;

class PersonaPanelController extends Controller
{
public function agregar(Request $form){


  $reglas = [

    ];

  $validator = Validator::make($form->all(), $reglas);

  $validator->sometimes('agregar_persona', 'required', function ($input) {
    return $input->cantVictimas > "1";
          });

  $validator->sometimes('nombre_persona_asistida', 'required|min:3|max:255|regex:/^([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/', function ($input) {        return $input->agregar_persona == 1 || $input->cantVictimas ==1;
          });

  $validator->sometimes('vinculo_persona_asistida', 'required', function ($input)
  {        return $input->agregar_persona == 1 || $input->cantVictimas ==1;
          });

  $validator->sometimes('telefono_persona_asistida', 'required|integer|digits_between:1,30', function ($input)
  {        return $input->agregar_persona == 1 || $input->cantVictimas ==1;
          });

  $validator->sometimes('domicilio_persona_asistida', 'required|min:3|max:255|regex:/^([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/', function ($input)
  {        return $input->agregar_persona == 1 || $input->cantVictimas ==1;
          });

  $validator->sometimes('localidad_persona_asistida', 'required|min:3|max:255|regex:/^([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/', function ($input)
  {        return $input->agregar_persona == 1 || $input->cantVictimas ==1;
          });


  $validator->sometimes('otro_vinculo_persona_asistida_cual', 'required|min:3|max:255|regex:/^([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/', function ($input) {        return $input->vinculo_persona_asistida == 4;
          });

  if ($validator->fails()) {
      return back()
                  ->withErrors($validator)
                  ->withInput();
  }

  if ($form["agregar_persona"] == 2) {
    return redirect("agregarPersona");

  } else {

$persona= new Persona();

$persona->nombre_persona_asistida= $form ["nombre_persona_asistida"];
$persona->vinculo_persona_asistida= $form ["vinculo_persona_asistida"];
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

}}


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
   $persona_nueva= Persona_nueva::where("idVictim",session("idVictim"))->where("idPersona",$id);
   $persona_nueva->delete();
   $persona_delete=Persona::where("id",$id)->delete();

   return redirect("paneldecontrol/1");


  }}