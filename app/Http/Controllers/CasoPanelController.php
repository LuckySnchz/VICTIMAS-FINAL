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
use App\Organismo;
use App\Departamento;
use App\Imputado;
use App\Provincia;
use App\Ciudad;
use App\Demanda;
use App\Derivacion;
use App\Oderivados;
use App\Tipo_demandas;
use App\MiModelo;



class CasoPanelController extends Controller
{

  public function editar(Request $form){

$hoy = date("d-m-Y");

    $hoy = date("d-m-Y",strtotime($hoy."+ 1 days"));
    $reglas = [

 "nombre_referencia" => "required|min:3|max:255|regex:/^([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/",
 "nro_carpeta" => "sometimes|nullable|max:40|regex:/^([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/",
 "delito" => "required",
 "descripcion_caso" => "required|min:3|max:255|regex:/^([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/",
 "fecha_ingreso" => "required|date_format:Y-m-d|before:$hoy",
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

  $validator->sometimes('fecha_hecho', "date_format:Y-m-d|before:$hoy|after:1899-12-31", function ($input) {
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

$caso = Caso::find($form["idCaso"]);

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
$caso->userID_modify= Auth::id();

$caso->sede=$user->getSede();


$caso->save();

$idCaso = $caso->id;

session(["idCaso" => $idCaso]);


          /* $caso->delitos()->sync($form["delitos"]);

           $caso->cavajs()->sync($form["cavaj"]);

          $caso->organismos()->sync($form["organismos"]);

          $idCaso= session("idCaso");*/
          return redirect("/paneldecontrol/$idCaso#A");



}
public function detalle($id) {

      $provincias = Provincia::all();
      $ciudades = Ciudad::all();
      $delitos = Delito::all();
      $cavajs = Cavaj::all();
      $usuarios = Usuario::all();
      $organismos = Organismo::all();
      $departamentos = Departamento::all();
      $caso=Caso::find($id);
    session(["idCaso"=> $id]);



$nombre_referencia=$caso->nombre_referencia;
$nro_carpeta=$caso->nro_carpeta;
$delito=$caso->delito;
$otro_delito=$caso->otro_delito;
$descripcion_caso=$caso->descripcion_caso;
$fecha_ingreso=$caso->fecha_ingreso;
$modalidad_ingreso=$caso->modalidad_ingreso;
$organismo=$caso->organismo;
$cual_otro_organismo=$caso->cual_otro_organismo;
$cavaj=$caso->cavaj;
$comisaria=$caso->comisaria;
$denuncias_previas=$caso->denuncias_previas;
$departamento_judicial=$caso->departamento_judicial;
$estado=$caso->estado;
$nombre_y_apellido_de_la_victima=$caso->nombre_y_apellido_de_la_victima;
$motivospasivos=$caso->motivospasivos;
$cual_otro_motivospasivo=$caso->cual_otro_motivospasivo;
$fecha_delito=$caso->fecha_delito;
$fecha_hecho=$caso->fecha_hecho;
$fecha_hecho_otro=$caso->fecha_hecho_otro;
$pais_hecho=$caso->pais_hecho;
$provincia_hecho=$caso->provincia_hecho;
$localidad_hecho=$caso->localidad_hecho;

return view("detalleCaso", compact("delitos", "cavajs","usuarios","organismos","departamentos","provincias","ciudades","nombre_referencia","nro_carpeta","delito","otro_delito","descripcion_caso","fecha_ingreso","modalidad_ingreso","organismo","cual_otro_organismo","cavaj","comisaria","denuncias_previas","departamento_judicial","estado","nombre_y_apellido_de_la_victima","motivospasivos","cual_otro_motivospasivo","fecha_delito","fecha_hecho","fecha_hecho_otro","pais_hecho","provincia_hecho","localidad_hecho","caso"));


      }

      public function search(Request $req) {
            $user = Auth::user();
            $delitos = Delito::all();
            $cavajs = Cavaj::all();
            $usuarios =Usuario::all();
            $oderivados = Oderivados::all();
            $tipo_demandas = Tipo_demandas::all();
             $casos=[];
             $demandas=[];
             $derivaciones=[];
             $buscar=$req["buscar"];

              $search = $req["search"];

              switch ($req["search"]) {

                case "presentacion":
                  $search =1;
                  break;
                case "intervencion":
                  $search =2 ;
                break;

                case "derivacion":
                  $search =3 ;

                  
                break;}


            if($user->hasRole('admin')){

        switch ($req["buscar"]) {
                case "1":
                
               $casos = Caso::where("activo", 1)
              ->where("nombre_referencia", "like", "%$search%")
            ->orWhere("nombre_y_apellido_de_la_victima", "like", "%$search%")
            ->orWhere("modalidad_ingreso", "like", "%$search%")
            ->get();
         break;
            case "2":
                 
              $demandas = Demanda::where("activo", 1)
            ->where("nombre_y_apellido_de_la_victima", "like", "%$search%")
            ->orWhere("modalidad_ingreso", "like", "%$search%")
            ->get();
             break;
            case "3":
                
              $derivaciones = Derivacion::where("activo", 1)
              ->where("nombre_y_apellido", "like", "%$search%")
              ->orWhere("modalidad_ingreso", "like", "%$search%")
              ->get();
              break;
              default:


        $casos = Caso::where("activo", 1)
              ->where("nombre_referencia", "like", "%$search%")
            ->orWhere("nombre_y_apellido_de_la_victima", "like", "%$search%")
            ->orWhere("modalidad_ingreso", "like", "%$search%")
            ->get();
      
                 
              $demandas = Demanda::where("activo", 1)
            ->where("nombre_y_apellido_de_la_victima", "like", "%$search%")
            ->orWhere("modalidad_ingreso", "like", "%$search%")
            ->get();  
           
                
              $derivaciones = Derivacion::where("activo", 1)
              ->where("nombre_y_apellido", "like", "%$search%")
              ->orWhere("modalidad_ingreso", "like", "%$search%")
              ->get();
 

        }
            }
         if($user->hasRole('profesional')){
          switch ($req["buscar"]) {
                case "1":

             $casos = Caso::where("activo", 1)
             ->where("userID_create",$user->getId())->where("nombre_referencia", "like", "%$search%")
             ->orwhere("userID_create",$user->getId())->where("nombre_y_apellido_de_la_victima", "like", "%$search%")

             ->orwhere("userID_create",$user->getId())->where("modalidad_ingreso", "like", "%$search%")
                      ->get();
                      break;
               case "2":       
            $demandas = Demanda::where("activo", 1)
            ->where("userID_create",$user->getId())->where("nombre_y_apellido_de_la_victima", "like", "%$search%")
            ->orwhere("userID_create",$user->getId())->where("modalidad_ingreso", "like", "%$search%")
                     ->get();
                     break;
                     case "3":
           $derivaciones = Derivacion::where("activo", 1)
           ->where("userID_create",$user->getId())->where("nombre_y_apellido", "like", "%$search%")
           ->orwhere("userID_create",$user->getId())->where("modalidad_ingreso", "like", "%$search%")
                    ->get();


            break;
            default:
            $casos = Caso::where("activo", 1)
             ->where("userID_create",$user->getId())->where("nombre_referencia", "like", "%$search%")
             ->orwhere("userID_create",$user->getId())->where("nombre_y_apellido_de_la_victima", "like", "%$search%")

             ->orwhere("userID_create",$user->getId())->where("modalidad_ingreso", "like", "%$search%")
                      ->get();
            $demandas = Demanda::where("activo", 1)
            ->where("userID_create",$user->getId())->where("nombre_y_apellido_de_la_victima", "like", "%$search%")
            ->orwhere("userID_create",$user->getId())->where("modalidad_ingreso", "like", "%$search%")
                     ->get();
           $derivaciones = Derivacion::where("activo", 1)
           ->where("userID_create",$user->getId())->where("nombre_y_apellido", "like", "%$search%")
           ->orwhere("userID_create",$user->getId())->where("modalidad_ingreso", "like", "%$search%")
                    ->get();


              }}

              if($user->hasRole('user')){
              switch ($req["buscar"]) {
                case "1":
                $casos=Caso::where("activo", 1)
                ->where("sede",$user->getSede())->where("nombre_referencia", "like", "%$search%")
                ->orwhere("sede",$user->getSede())->where("nombre_y_apellido_de_la_victima", "like", "%$search%")
                ->orwhere("sede",$user->getSede())->where("modalidad_ingreso", "like", "%$search%")
                ->get();
                break;
                 case "2":
                $demandas=Demanda::where("activo", 1)
                ->where("sede",$user->getSede())->where("nombre_y_apellido_de_la_victima", "like", "%$search%")
                ->orwhere("sede",$user->getSede())->where("modalidad_ingreso", "like", "%$search%")
                ->get();
                break;
                 case "3":
                $derivaciones=Derivacion::where("activo", 1)
                ->where("sede",$user->getSede())->where("nombre_y_apellido", "like", "%$search%")
                ->orwhere("sede",$user->getSede())->where("modalidad_ingreso", "like", "%$search%")
                ->get();
                default:
                $casos=Caso::where("activo", 1)
                ->where("sede",$user->getSede())->where("nombre_referencia", "like", "%$search%")
                ->orwhere("sede",$user->getSede())->where("nombre_y_apellido_de_la_victima", "like", "%$search%")
                ->orwhere("sede",$user->getSede())->where("modalidad_ingreso", "like", "%$search%")
                ->get();
                $demandas=Demanda::where("activo", 1)
                ->where("sede",$user->getSede())->where("nombre_y_apellido_de_la_victima", "like", "%$search%")
                ->orwhere("sede",$user->getSede())->where("modalidad_ingreso", "like", "%$search%")
                ->get();
                $derivaciones=Derivacion::where("activo", 1)
                ->where("sede",$user->getSede())->where("nombre_y_apellido", "like", "%$search%")
                ->orwhere("sede",$user->getSede())->where("modalidad_ingreso", "like", "%$search%")
                ->get();
              }}



        return view("home", compact("casos","demandas","derivaciones","tipo_demandas","oderivados","delitos","cavajs","user","buscar"));
      }










     public function eliminar($id) {
        $caso = Caso::find($id);
        $caso->delete();
          return redirect("home");

      }

}
