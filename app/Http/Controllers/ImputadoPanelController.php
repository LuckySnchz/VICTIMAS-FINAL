<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Imputado;
use Validator;

class ImputadoPanelController extends Controller
{
  public function editar(request $form) {

    $reglas = [
      "nombre_y_apellido"=>"required|min:3|max:255|regex:/^([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/",
      "apodo"=>"required|min:3|max:50|regex:/^([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/",
      "tipo_documento_id"=>"required",
      "imputado_documento"=>'required|integer',
      "vinculo_id"=>"required",
      'caratulacion_judicial'=> 'required|min:3|max:100|regex:/^([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/',
      "antecedentes_id"=>"required",
      'detenido'=> 'required|integer',
      'defensor_particular'=> 'required|integer',
      'defensoria_numero'=> 'required|min:1|max:50|regex:/^([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/',
      'fiscalia_juzgado'=> 'required|min:3|max:50|regex:/^([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/',
      'causa_id_judicial'=> 'required|numeric'

    ];

    $validator = Validator::make($form->all(), $reglas);
    $validator->sometimes('tipo_documento_otro', 'required|min:3|max:50|regex:/^([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/', function ($input) {
      return $input->tipodocumento_id == 9;
            });

    $validator->sometimes('vinculo_otro', "required|min:3|max:100|regex:/^([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/", function ($input) {
      return $input->vinculo_id == 6;
                    });

    $validator->sometimes('antecedentes', "required|min:3|max:100|regex:/^([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/", function ($input) {
      return $input->antecedentes_id == 1;
                    });

    $validator->sometimes('lugar_de_alojamiento', "required|min:3|max:100|regex:/^([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/", function ($input) {
      return $input->detenido == 1;
                    });


    if ($validator->fails()) {
        return back()
                    ->withErrors($validator)
                    ->withInput();
    }

    $imputado = Imputado::find($form["idImputado"]);

    $imputado->nombre_y_apellido= $form["imputado_nombre_y_apellido"];
    $imputado->apodo= $form["apodo"];
    $imputado->tipo_documento_id= $form["tipodocumento_id"];
    $imputado->tipo_documento_otro= $form["imputado_tipo_documento_otro"];
    $imputado->documento_nro= $form["imputado_documento"];
    $imputado->vinculo_id= $form["vinculo_id"];
    $imputado->vinculo_otro= $form["vinculo_otro"];
    $imputado->caratulacion_judicial= $form["caratulacion_judicial"];
    $imputado->antecedentes_id= $form["antecedentes_id"];
    $imputado->antecedentes= $form["antecedentes"];
    $imputado->detenido= $form["detenido"];
    $imputado->lugar_de_alojamiento= $form["lugar_de_alojamiento"];
    $imputado->defensor_particular= $form["defensor_particular"];
    $imputado->defensoria_nro= $form["defensoria_numero"];
    $imputado->fiscalia_juzgado= $form["fiscalia_juzgado"];
    $imputado->causa_id_judicial= $form["causa_id_judicial"];
    $imputado->idCaso= session("idCaso");


      $imputado->userID_modify= Auth::id();
      $imputado->save();

      return redirect("/paneldecontrol/$imputado->idCaso");


}
public function detalle($id) {
    $imputados=Imputado::all();
    $imputado = Imputado::find($id);
    session(["idImputado" => $id]);

    $imputado_nombre_y_apellido=$imputado->nombre_y_apellido;
    $apodo= $imputado->apodo;
    $tipodocumento_id= $imputado->tipo_documento_id;
    $imputado_tipo_documento_otro=$imputado->tipo_documento_otro;
    $imputado_documento=$imputado->documento_nro;
    $vinculo_id=$imputado->vinculo_id;
    $vinculo_otro= $imputado->vinculo_otro;
    $caratulacion_judicial=$imputado->caratulacion_judicial;
    $antecedentes_id=$imputado->antecedentes_id;
    $antecedentes=$imputado->antecedentes;
    $detenido=$imputado->detenido;
    $lugar_de_alojamiento=$imputado->lugar_de_alojamiento;
    $defensor_particular=$imputado->defensor_particular;
    $defensoria_numero=$imputado->defensoria_nro;
    $fiscalia_juzgado=$imputado->fiscalia_juzgado;
    $causa_id_judicial= $imputado->causa_id_judicial;

    return view("detalleimputado", compact("imputados","imputado","imputado_nombre_y_apellido","apodo","tipodocumento_id","imputado_tipo_documento_otro","imputado_documento","vinculo_id","vinculo_otro","caratulacion_judicial","antecedentes_id","antecedentes","detenido","lugar_de_alojamiento","defensor_particular","defensoria_numero","fiscalia_juzgado","causa_id_judicial"));
  }

  public function eliminar($id) {
    $imputado = Imputado::find($id);
    $imputado->delete();
    $idCaso = session("idCaso");
return redirect("paneldecontrol/{$imputado->idCaso}");


  }

public function agregar(request $form) {

    $reglas = [
      "imputado_nombre_y_apellido"=>"required|max:255",
      "tipodocumento_id"=>"required",
      "imputado_documento"=>"required|max:255",
      "vinculo_id"=>"required",
      "antecedentes_id"=>"required",
      "defensoria_numero"=>"required|max:255"

    ];

    $validator = Validator::make($form->all(), $reglas);
    $validator->sometimes('imputado_tipo_documento_otro', 'required|max:255', function ($input) {     return $input->tipodocumento_id == 9;
            });

    $validator->sometimes('vinculo_otro', 'required|max:255', function ($input) {     return $input->vinculo_id == 6;
                    });


    if ($validator->fails()) {
        return back()
                    ->withErrors($validator)
                    ->withInput();
    }

    $imputado = new Imputado();

    $imputado->nombre_y_apellido= $form["imputado_nombre_y_apellido"];
    $imputado->tipo_documento_id= $form["tipodocumento_id"];
    $imputado->tipo_documento_otro= $form["imputado_tipo_documento_otro"];
    $imputado->documento_nro= $form["imputado_documento"];
    $imputado->vinculo_id= $form["vinculo_id"];
    $imputado->vinculo_otro= $form["vinculo_otro"];
    $imputado->antecedentes_id= $form["antecedentes_id"];
    $imputado->defensoria_nro= $form["defensoria_numero"];
    $imputado->idCaso= session("idCaso");
    $imputado->userID_create= Auth::id();


    $imputado->save();
return redirect("/paneldecontrol/$imputado->idCaso");}
}
