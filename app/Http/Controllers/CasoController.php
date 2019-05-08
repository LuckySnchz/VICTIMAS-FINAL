<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Caso;
use App\Delito;
use Validator;
use App\Cavaj;
use App\Usuario;
use App\User;
use App\Hecho;


class CasoController extends Controller
{

public function agregar(Request $form){

    $hoy = date("d-m-Y");

    $hoy = date("d-m-Y",strtotime($hoy."+ 1 days"));
    $reglas = [

"nombre_referencia" => "required|min:3|max:255|regex:/^([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/",
"nro_carpeta" => "sometimes|nullable|max:40|regex:/^([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/",
"delito" => "required",
"descripcion_caso" => "required|min:3|max:255",
"fecha_ingreso" => "required|date_format:Y-m-d|before:$hoy|after:1899-12-31",
"modalidad_ingreso" => "required",
"cavaj" => "required",
"comisaria" => "required|min:3|max:255|regex:/^([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/",
"denuncias_previas" => "required",
"departamento_judicial" => "required",
"estado" => "required",
"nombre_y_apellido_de_la_victima" => "required|min:3|max:255|regex:/^([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/",
"fecha_delito"=>"required",
"pais_hecho"=>"required",
"provincia_hecho"=>"required",
"localidad_hecho"=>"required"

    ];

$validator = Validator::make($form->all(), $reglas);

$validator->sometimes('organismo', 'required', function ($input) {
return $input->modalidad_ingreso == 3;
  });

$validator->sometimes('motivospasivos', 'required', function ($input) {
return $input->estado == 2;
  });

$validator->sometimes('cual_otro_motivospasivos', "required|min:3|max:255|regex:/^([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/", function ($input) {
return $input->motivospasivos == 5;
  });

$validator->sometimes('cual_otro_organismo', "required|min:3|max:255|regex:/^([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/", function ($input) {
return $input->organismo == 24;
  });

$validator->sometimes('otro_delito', "required|min:3|max:255|regex:/^([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/", function ($input) {
return $input->delito == 73;
  });

  $validator->sometimes('fecha_hecho', "required|date_format:Y-m-d|before:$hoy|after:1899-12-31", function ($input) {
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

$user = Auth::user();

$caso= new Caso();

$caso->nombre_referencia= $form["nombre_referencia"];
$caso->nro_carpeta= $form["nro_carpeta"];
$caso->delito= $form["delito"];
$caso->otro_delito= $form["otro_delito"];
$caso->descripcion_caso= $form["descripcion_caso"];
$caso->fecha_ingreso= $form["fecha_ingreso"];
$caso->modalidad_ingreso= $form["modalidad_ingreso"];
$caso->organismo= $form["organismo"];
$caso->cual_otro_organismo= $form["cual_otro_organismo"];
$caso->cavaj= $form["cavaj"];
$caso->comisaria= $form["comisaria"];
$caso->denuncias_previas= $form["denuncias_previas"];
$caso->departamento_judicial= $form["departamento_judicial"];
$caso->estado= $form["estado"];
$caso->nombre_y_apellido_de_la_victima=$form["nombre_y_apellido_de_la_victima"];
$caso->motivospasivos= $form["motivospasivos"];
$caso->cual_otro_motivospasivo= $form["cual_otro_motivospasivos"];
$caso->fecha_delito= $form ["fecha_delito"];
$caso->fecha_hecho= $form ["fecha_hecho"];
$caso->fecha_hecho_otro  = $form ["fecha_hecho_otro"];
$caso->pais_hecho= $form ["pais_hecho"];
$caso->provincia_hecho= $form ["provincia_hecho"];
$caso->localidad_hecho= $form ["localidad_hecho"];
$caso->activo=1;

$caso->userID_create= Auth::id();
$caso->sede=$user->getSede();


$caso->save();
$idCaso = $caso->id;

session(["idCaso" => $idCaso]);



    return redirect("agregarProfesional");


}


public function detalle($id) {
    $caso = Caso::find($id);
    $vac = compact("caso","delitos","cavajs","usuarios");

    return view("detalleCaso", $vac);
  }


      public function eliminar($id) {
        $caso = Caso::find($id);
        $caso->delete();
          return redirect("home");

      }


}
