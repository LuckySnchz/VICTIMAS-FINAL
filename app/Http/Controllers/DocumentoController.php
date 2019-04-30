<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Documento;

use Validator;

class DocumentoController extends Controller
{
public function agregar(Request $form){

  $reglas = [
    "tipo_documento"=>"required",
    "nombre_documento"=>"required|min:3|max:100|regex:/^([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/",
    "archivo"=>"required|file|max:5120"
  ];

  $validator = Validator::make($form->all(), $reglas);


  if ($validator->fails()) {
      return back()
                  ->withErrors($validator)
                  ->withInput();
  }


$archivo = $form->file("archivo");
$rutaDondeSeGuardaElArchivo = $archivo->store("public");
$nombreDelArchivo = basename($rutaDondeSeGuardaElArchivo);

$documento= new Documento( );

  $documento->tipo_documento= $form [ "tipo_documento"];
  $documento->nombre_documento= $form [ "nombre_documento"];
  $documento->archivo = $nombreDelArchivo;
  $documento->idCaso= session("idCaso");
  $documento->userID_create= Auth::id();

  $documento->save( );
  return redirect ("agregarDocumento");
}


public function detalle($id) {

    $documento = Documento::find($id);


    $vac = compact("documento");

    return view("detalleDocumento", $vac);
  }

  public function eliminar($id) {
    $documento = Documento::find($id);
    $documento->delete();
      return redirect("paneldecontrol");

  }
  public function editar(Request $form) {
      $documento = Documento::find($form["idDocumento"]);
      $documento->tipo_documento= $form ["tipo_documento"];
      $documento->nombre_documento= $form ["nombre_documento"];
      $documento->idCaso= $form ["idCaso"];

           $documento->save();
            return redirect("home");}




}
