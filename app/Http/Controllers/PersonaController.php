<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Persona;
use App\Persona_nueva;
use Validator;
use App\Victim;

class PersonaController extends Controller
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


return redirect ("agregarPersona");

}}

public function vincular(Request $f) {
  $persona_nueva = new Persona_nueva();
  $persona_nueva->idVictim= session("idVictim");
  $persona_nueva->idPersona= 99999;
  $persona_nueva->idPersona= $f ["vinculo_persona_asistida"];

  return redirect ("agregarPersona");


}

 public function duplicar($id) {

  if(Persona_nueva::where("idVictim",session("idVictim"))->where("idPersona",$id)->count()==0){
      $persona_nueva = Persona_nueva::find(1)->replicate();
      $persona_nueva->idVictim= session("idVictim");
      $persona_nueva->idPersona= $id;

      $persona_nueva->save();



        return redirect("agregarPersona");}else{
          $duplicado=Persona::find($id);
          $victima=Victim::find(session("idVictim"));
          return view("duplicar",compact("duplicado","victima"));

        }


    }



   public function eliminarpersona($id) {
     $personaelim=Persona::find($id)->getIdCaso();
 $persona_nueva= Persona_nueva::where("idVictim",session("idVictim"))->where("idPersona",$id);
   $persona_nueva->delete();


   return redirect("/paneldecontrol/$personaelim");}


public function detalle($id) {

    $persona = Persona::find($id);


    $vac = compact("persona");

    return view("detallePersona", $vac);
  }



  public function editar(Request $form) {
      $persona = Persona::find($form["idPersona"]);

      $persona->nombre_persona_asistida= $form ["nombre_persona_asistida"];
      $persona->vinculo_persona_asistida= $form ["vinculo_persona_asistida"];
      $persona->otro_vinculo_persona_asistida_cual= $form ["otro_vinculo_persona_asistida_cual"];
      $persona->telefono_persona_asistida= $form ["telefono_persona_asistida"];
      $persona->domicilio_persona_asistida= $form ["domicilio_persona_asistida"];
      $persona->localidad_persona_asistida= $form ["localidad_persona_asistida"];
      $persona->idCaso= $form["idCaso"];
      $persona->userID_create= $form["userID_create"];
      $persona->userID_modify= Auth::id();


     $persona->save();
      return redirect("home");}


}
