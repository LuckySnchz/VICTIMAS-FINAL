<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Conviviente;
use App\Conviviente_nuevo;
use Validator;

class ConvivientePanelController extends Controller
{

  public function editar(request $form) {

    $reglas = [
      "nombre_y_apellido"=>"required|min:3|max:100|regex:/^([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/",
      "edad_conviviente"=>"required|integer|between:0,99",
      "vinculo_victima"=>"required",
      "niveleducativo_id"=>"required",
      "condiciones_de_trabajo"=>"required"
    ];

    $validator = Validator::make($form->all(), $reglas);

    $validator->sometimes('vinculo_otro', 'required|min:3|max:60|regex:/^([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/', function ($input) {
      return $input->vinculo_victima == 6;
    });

    if ($validator->fails()) {
        return back()
                    ->withErrors($validator)
                    ->withInput();
    }

    $conviviente = Conviviente::find($form["idConviviente"]);

    $conviviente->nombre_y_apellido= $form["nombre_y_apellido"];
    $conviviente->edad= $form["edad_conviviente"];
    $conviviente->vinculo_victima= $form["vinculo_victima"];
    $conviviente->vinculo_otro= $form["vinculo_otro"];
    $conviviente->niveleducativo_id= $form["niveleducativo_id"];
    $conviviente->condiciones_de_trabajo= $form["condiciones_de_trabajo"];

    $conviviente->userID_modify= Auth::id();

    $conviviente->idCaso= $form ["idCaso"];

             $conviviente->save();
             return redirect("paneldecontrol/{$conviviente->idCaso}");}


 public function detalle($id) {
      $convivientes=Conviviente::all();
      $conviviente = Conviviente::find($id);
      session(["idConviviente" => $id]);
      $nombre_y_apellido=$conviviente->nombre_y_apellido;
      $edad_conviviente=$conviviente->edad;
      $vinculo_victima=$conviviente->vinculo_victima;
      $vinculo_otro=$conviviente->vinculo_otro;
      $niveleducativo_id=$conviviente->niveleducativo_id;
      $condiciones_de_trabajo=$conviviente->condiciones_de_trabajo;

      return view("detalleconviviente", compact("conviviente","convivientes","nombre_y_apellido","edad_conviviente","vinculo_victima","vinculo_otro","niveleducativo_id","condiciones_de_trabajo"));
    }

  public function agregar(request $form) {

  $reglas = [

  ];

    $validator = Validator::make($form->all(), $reglas);

    $validator->sometimes('agregar_conviviente', 'required', function ($input) {
      return $input->cantVictimas > "1";
            });

    $validator->sometimes('nombre_y_apellido', 'required|min:3|max:100|regex:/^([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/', function ($input) {
      return $input->agregar_conviviente == 1 || $input->cantVictimas ==1;
            });

  $validator->sometimes('edad', 'required|integer|between:0,99', function ($input) {
    return $input->agregar_conviviente == 1 || $input->cantVictimas ==1;
          });

  $validator->sometimes('vinculo_victima', 'required', function ($input) {
    return $input->agregar_conviviente == 1 || $input->cantVictimas ==1;
          });

    $validator->sometimes('vinculo_otro', "required|min:3|max:60|regex:/^([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/", function ($input) {
      return $input->vinculo_victima == 6;
    });

    $validator->sometimes('niveleducativo_id', 'required', function ($input) {
      return $input->agregar_conviviente == 1 || $input->cantVictimas ==1;
            });

  $validator->sometimes('condiciones_de_trabajo', 'required', function ($input) {
    return $input->agregar_conviviente == 1 || $input->cantVictimas ==1;
          });

    if ($validator->fails()) {
        return back()
                    ->withErrors($validator)
                    ->withInput();
    }

    if ($form["agregar_conviviente"] == 2) {
      return redirect("agregarconviviente");

    } else {



    $conviviente = new Conviviente();

    $conviviente->nombre_y_apellido= $form["nombre_y_apellido"];
    $conviviente->edad= $form["edad"];
    $conviviente->vinculo_victima= $form["vinculo_victima"];
    $conviviente->vinculo_otro= $form["vinculo_otro"];
    $conviviente->niveleducativo_id= $form["niveleducativo_id"];
    $conviviente->condiciones_de_trabajo= $form["condiciones_de_trabajo"];
    $conviviente->userID_create= Auth::id();
    $conviviente->idCaso= session("idCaso");
    $conviviente->idVictim= session("idVictim");



    $conviviente->save();

    $conviviente->victims()->attach($form ["idVictim"], array("vinculo_victima"=> $form ["vinculo_victima"]));


 return redirect("paneldecontrol/{$conviviente->idCaso}");
  }}










}
 

  





    
