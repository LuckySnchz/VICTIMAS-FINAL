<?php


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', function () {
    return view('welcome');
});

//RUTAS DE AGREGAR CASO (EUGE)------------------------------------------------//
//A-CASO//
Route::get("/agregarCaso",function(){
  $provincias = App\Provincia::all();
  $ciudades = App\Ciudad::all();
  $delitos = DB::table("delitos")
  ->select(DB::raw("*"))
  ->orderBy(DB::raw("nombre","ASC"))
  ->get();
  $cavajs = App\Cavaj::all();
  $usuarios = App\Usuario::all();
  $organismos = App\Organismo::all();
  $departamentos = App\Departamento::all();
  return view("agregarCaso", compact("delitos","provincias", "ciudades","cavajs","usuarios","organismos","departamentos"));
})->middleware('auth');
Route::post("/agregarCaso","CasoController@agregar")->middleware('auth');

//A-PROFESIONAL//

Route::get("/agregarProfesional",function(){
    $profesionales = App\Profesional::all();
    $vistas=App\Vista::all();
    $instituciones = App\Institucion::all();
    $institucionnav= App\Institucion::where("idCaso",session("idCaso"))->count();
    $usuarios = DB::table("usuarios")
    ->select(DB::raw("*"))
    ->orderBy(DB::raw("nombre_y_apellido","ASC"))
    ->get();

return view("agregarProfesional",compact("profesionales","usuarios","vistas","instituciones","institucionnav"));
})->middleware('auth');
Route::post("/agregarProfesional","ProfesionalController@agregar")->middleware('auth');

//A-PERSONA ASISTIDA//

Route::get("/agregarPersona",function(){
  $personas = App\Persona::all();
  $personas_nuevas = App\Persona_nueva::all();


    $casoActual = App\Caso::find(session("idCaso"));
    $victimActual = App\Victim::find(session("idVictim"));

  $casoActualenPersona = App\Persona::where("idCaso",session("idCaso"))->count();
  $cantdeVictimas = App\Victim::where("idCaso",session("idCaso"))->count();
  $cantdePersonas = App\Persona::where("idCaso",session("idCaso"))->count();
  $vistas=App\Vista::all();
  $instituciones = App\Institucion::all();
  $institucionnav= App\Institucion::where("idCaso",session("idCaso"))->count();
return view("agregarPersona",compact("casoActual","cantdeVictimas","casoActualenPersona","victimActual","personas","vistas","instituciones","institucionnav","cantdePersonas","personas_nuevas"));
})->middleware('auth');
Route::post("/agregarPersona","PersonaController@agregar")->middleware('auth');


Route::get("/duplicar",function(){

return view("duplicar");
})->middleware('auth');


Route::get("/duplicar/{id}", "PersonaController@duplicar")->middleware('auth');

Route::get("/eliminarpersona/{id}", "PersonaController@eliminarpersona")->middleware('auth');




//B-VICTIMAS//

Route::get("/agregarVictima",function(){
  $necesidades = App\Necesidad::all();
  $programas = App\Programa::all();
  $discapacidades = App\Discapacidad::all();
  $limitaciones = App\Limitacion::all();
  $victims= App\Victim::all();
  $vistas=App\Vista::all();
  $instituciones = App\Institucion::all();
  $institucionnav= App\Institucion::where("idCaso",session("idCaso"))->count();
  return view("agregarVictima", compact("necesidades","programas","discapacidades","limitaciones","victims","vistas","instituciones","institucionnav"));
})->middleware('auth');
Route::post("/agregarVictima","VictimController@agregar")->middleware('auth');

Route::get("/eliminarvictima/{id}", "VictimController@eliminarvictima")->middleware('auth');

//C-CONVIVIENTES//

Route::get("/agregarconviviente",function(){
    $convivientes = App\Conviviente::all();
    $vistas=App\Vista::all();
    $cantdeVictimas = App\Victim::where("idCaso",session("idCaso"))->count();
    $instituciones = App\Institucion::all();
     $casoActual = App\Caso::find(session("idCaso"));
    $victimActual = App\Victim::find(session("idVictim"));
     $institucionnav= App\Institucion::where("idCaso",session("idCaso"))->count();
     $convivientes_nuevos = App\Conviviente_nuevo::all();
  return view("agregarconviviente",compact("convivientes_nuevos","cantdeVictimas","victimActual","convivientes","vistas","instituciones","institucionnav","casoActual"));
})->middleware('auth');
Route::post("/agregarconviviente","ConvivienteController@agregar")->middleware('auth');

Route::get("/duplicarreferente/{id}", "ConvivienteController@duplicar")->middleware('auth');

Route::get("/eliminarconviviente/{id}", "ConvivienteController@eliminarconviviente")->middleware('auth');

//D-HECHOS//

Route::get("/agregarDelito",function(){
  $provincias = App\Provincia::all();
  $ciudades = App\Ciudad::all();
  $vistas=App\Vista::all();
  $hechos= App\Hecho::All();
  $instituciones = App\Institucion::all();
  $institucionnav= App\Institucion::where("idCaso",session("idCaso"))->count();
  return view("agregarDelito",compact("imputados","provincias", "ciudades","vistas","hechos","instituciones","institucionnav"));
})->middleware('auth');
Route::post("/agregarDelito","HechoController@agregar")->middleware('auth');

//E-IMPUTADOS//

Route::get("/agregarimputado",function(){
    $imputados = App\Imputado::all();
    $imputados_nuevos = App\Imputado_nuevo::all();
    $vistas=App\Vista::all();
     $casoActual = App\Caso::find(session("idCaso"));
       $victimActual = App\Victim::find(session("idVictim"));
    $cantdeVictimas = App\Victim::where("idCaso",session("idCaso"))->count();
     $instituciones = App\Institucion::all();
   
    $institucionnav= App\Institucion::where("idCaso",session("idCaso"))->count();
  return view("agregarimputado",compact("cantdeVictimas","victimActual","imputados","vistas","instituciones","institucionnav","imputados_nuevos","casoActual"));
})->middleware('auth');
Route::post("/agregarimputado","ImputadoController@agregar")->middleware('auth');


Route::get("/duplicar",function(){

return view("duplicarimputado");
})->middleware('auth');


Route::get("/duplicarimputado/{id}", "ImputadoController@duplicar")->middleware('auth');

Route::get("/eliminarimputado/{id}", "ImputadoController@eliminarimputado")->middleware('auth');

//F-ORGANISMOS//

Route::get("/agregarOrganismo",function(){
  $oprevios = App\Oprevio::all();
  $oarticulas = App\Oarticula::all();
  $socioeconomicos = App\Socioeconomico::all();
  $departamentos = App\Departamento::all();
  $victimas= App\Victim::all();
  $vistas=App\Vista::all();
  $instituciones = App\Institucion::all();
return view("agregarOrganismo", compact("oprevios","oarticulas","socioeconomicos","victimas","departamentos","vistas","instituciones"));
})->middleware('auth');
Route::post("/agregarOrganismo","InstitucionController@agregar")->middleware('auth');

//G-DOCUMENTOS//

Route::get("/agregarDocumento",function(){
    $documentos = App\Documento::all();
    $vistas= App\Vista::all();
    $instituciones = App\Institucion::all();
    $institucionnav= App\Institucion::where("idCaso",session("idCaso"))->count();
return view("agregarDocumento",compact("documentos","vistas","instituciones","institucionnav"));
})->middleware('auth');
Route::post("/agregarDocumento","DocumentoController@agregar")->middleware('auth');

//G2-INFORME E INTERVENCION//

Route::get("/agregarIntervencion",function(){
  $provincias = App\Provincia::all();
  $ciudades = App\Ciudad::all();
  $hechos= App\Hecho::All();
  $casos = App\Caso::all();
  $instituciones = App\Institucion::all();
  $socioeconomicos = App\Socioeconomico::all();
  $departamentos = App\Departamento::all();
  $victimas= App\Victim::all();
  $intervenciones = App\Intervencion::all();
  $organismos = App\Organismo::all();
  $caratulas = App\Caratula::all();
  $caso_cavajs = App\Caso_cavaj::all();
  $institucion_oarticulas = App\Institucion_Oarticula::all();
  $delitos = App\Delito::all();
  $cavajs = App\Cavaj::all();
  $oarticulas = App\Oarticula::all();
  $vistas= App\Vista::all();
  $casoActual = App\Caso::find(session("idCaso"));
  $instituciones = App\Institucion::all();
 $institucionnav= App\Institucion::where("idCaso",session("idCaso"))->count();

  return view("agregarIntervencion", compact("provincias", "ciudades","hechos","organismos","oarticulas","cavajs","delitos","institucion_oarticulas","caso_cavajs","casos","instituciones","socioeconomicos","victimas","caratulas","departamentos", "intervenciones", "casoActual","vistas","instituciones","institucionnav"));
})->middleware('auth');
Route::post("/agregarIntervencion","IntervencionController@agregar")->middleware('auth');





Route::get("/kpi","KpiController@index")->middleware('auth');

Route::post("/kpi","KpiController@index")->middleware('auth');





// FIN RUTAS DE AGREGAR CASO (EUGE)------------------------------------------------//

//---------HOME VISTA DEL BUSCADOR)-------------//
//EDITAR CASO//
Route::get("/inicio",function(){

    $casos = [];


    return view("inicio",compact("casos"));
});

Route::get("/search", "CasoPanelController@search")->middleware('auth');
//INFORME//

Route::get("/sel",function(){

$casos = [];

    return view("sel",compact("casos"));
})->middleware('auth');

Route::get("/search2", "CasoController@search")->middleware('auth');

//INTERVENCION//

Route::get("/select",function(){

$casos = [];

    return view("select",compact("casos"));
})->middleware('auth');

Route::get("/search3", "IntervencionController@search")->middleware('auth');

Route::get("/agregarIntervencion/{id}",function($id){
  session(["idCaso" => $id]);
  $casos = App\Caso::all();
  $instituciones = App\Institucion::all();
  $socioeconomicos = App\Socioeconomico::all();
  $departamentos = App\Departamento::all();
  $victimas= App\Victim::all();
  $ciudades= App\Ciudad::all();
  $organismos = App\Organismo::all();
  $intervenciones = App\Intervencion::all();
  $caratulas = App\Caratula::all();
  $caso_cavajs = App\Caso_cavaj::all();
  $institucion_oarticulas = App\Institucion_Oarticula::all();
  $delitos = App\Delito::all();
  $cavajs = App\Cavaj::all();
  $provincias = App\Provincia::all();
  $oarticulas = App\Oarticula::all();
  $institucionnav= App\Institucion::where("idCaso",session("idCaso"))->count();
  $casoActual = App\Caso::find(session("idCaso"));
  return view("agregarIntervencion", compact("institucionnav","provincias","organismos","ciudades","oarticulas","cavajs","delitos","institucion_oarticulas","caso_cavajs","casos","instituciones","socioeconomicos","victimas","caratulas","departamentos", "intervenciones", "casoActual"));
})->middleware('auth');
Route::post("/agregarIntervencion","IntervencionController@agregar")->middleware('auth');

Route::get("/eliminarintervencion/{id}", "IntervencionController@eliminarintervencion")->middleware('auth');

Route::get("/detalleagregarIntervencion/{id}",function($id){
  session(["idCaso" => $id]);
  $casos = App\Caso::all();
  $instituciones = App\Institucion::all();
  $socioeconomicos = App\Socioeconomico::all();
  $departamentos = App\Departamento::all();
  $victimas= App\Victim::all();
  $ciudades= App\Ciudad::all();
  $intervenciones = App\Intervencion::all();
  $caratulas = App\Caratula::all();
  $provincias = App\Provincia::all();
  $caso_cavajs = App\Caso_cavaj::all();
  $organismos = App\Organismo::all();
  $institucion_oarticulas = App\Institucion_Oarticula::all();
  $delitos = App\Delito::all();
  $cavajs = App\Cavaj::all();
  $oarticulas = App\Oarticula::all();
  $casoActual = App\Caso::find(session("idCaso"));
  return view("detalleagregarIntervencion", compact("ciudades","oarticulas","cavajs","delitos","provincias","organismos","institucion_oarticulas","caso_cavajs","casos","instituciones","socioeconomicos","victimas","caratulas","departamentos", "intervenciones", "casoActual"));
});
Route::post("/detalleagregarIntervencion","IntervencionPanelController@agregar");

// RUTAS DE edicion CASO (LUCKY)------------------------------------------------//

Route::get("/detalleCaso/{id}", "CasoPanelController@detalle")->middleware('auth');
Route::post("/detalleCaso", "CasoPanelController@editar")->middleware('auth');

Route::get("/detalleProfesional/{id}", "ProfesionalPanelController@detalle")->middleware('auth');
Route::post("/detalleProfesional", "ProfesionalPanelController@editar")->middleware('auth');
Route::get("/detalleProfesional/deleteProfesional/{id}", "ProfesionalPanelController@eliminar")->middleware('auth');


Route::get("/detallePersona/{id}", "PersonaPanelController@detalle")->middleware('auth');
Route::post("/detallePersona", "PersonaPanelController@editar")->middleware('auth');
Route::get("/detallePersona/deletePersona/{id}", "PersonaPanelController@eliminar")->middleware('auth');
//EJE B: VICTIMA//

Route::get("/victima/{idCaso}/{idVictima}", "VictimaPanelController@victima")->middleware('auth');


Route::get("/detalleVictima/{id}", "VictimaPanelController@detalle")->middleware('auth');
Route::post("/detalleVictima", "VictimaPanelController@editar")->middleware('auth');
Route::get("/detalleVictima/deleteVictima/{id}", "VictimaPanelController@eliminar")->middleware('auth');
//EJE C: CONVIVIENTE//
Route::get("/detalleconviviente/{id}", "ConvivientePanelController@detalle")->middleware('auth');
Route::post("/detalleconviviente", "ConvivientePanelController@editar")->middleware('auth');
Route::get("/detalleconviviente/deleteconviviente/{id}", "ConvivientePanelController@eliminar")->middleware('auth');
//EJE D:DELITO//

Route::get("/detalleDelito/{id}", "HechoPanelController@detalle")->middleware('auth');
Route::post("/detalleDelito", "HechoPanelController@editar")->middleware('auth');
//EJE E: IMPUTADO//

Route::get("/detalleimputado/{id}", "ImputadoPanelController@detalle")->middleware('auth');

Route::post("/detalleimputado", "ImputadoPanelController@editar")->middleware('auth');
Route::get("/detalleimputado/deleteimputado/{id}", "ImputadoPanelController@eliminar")->middleware('auth');
//EJE F: ORGANISMO//
Route::get("/detalleOrganismo/{id}", "InstitucionPanelController@detalle")->middleware('auth');
Route::post("/detalleOrganismo", "InstitucionPanelController@editar")->middleware('auth');

//EJE G: DOCUMENTOS//
Route::get("/deleteDocumento/{id}", "DocumentoPanelController@eliminar")->middleware('auth');


//RURA DETALLEAGREGA AGREGA en el C.Panel//
//AGREGA EJE A:PERSONA//
Route::get("/detalleagregarPersona",function(){
  $personas = App\Persona::all();
  $personas_nuevas = App\Persona_nueva::all();
  $casoActual = App\Caso::find(session("idCaso"));
  $victimActual = App\Victim::find(session("idVictim"));
  $casoActualenPersona = App\Persona::where("idCaso",session("idCaso"))->count();
  $cantdeVictimas = App\Victim::where("idCaso",session("idCaso"))->count();
  $cantdePersonas = App\Persona::where("idCaso",session("idCaso"))->count();
  $vistas=App\Vista::all();
  $instituciones = App\Institucion::all();
  $institucionnav= App\Institucion::where("idCaso",session("idCaso"))->count();
return view("detalleagregarPersona",compact("casoActual","cantdeVictimas","casoActualenPersona","victimActual","personas","vistas","instituciones","institucionnav","cantdePersonas","personas_nuevas"));
})->middleware('auth');
Route::post("/detalleagregarPersona","PersonaPanelController@agregar")->middleware('auth');
Route::post("/detalleagregarPersona/{id}","PersonaPanelController@editar")->middleware('auth');

//AGREGA EJE A: PROFESIONAL//

Route::get("/detalleagregarProfesional",function(){
    $profesionales = App\Profesional::all();
    $vistas=App\Vista::all();
    $instituciones = App\Institucion::all();
    $institucionnav= App\Institucion::where("idCaso",session("idCaso"))->count();
    $usuarios = DB::table("usuarios")
    ->select(DB::raw("*"))
    ->orderBy(DB::raw("nombre_y_apellido","ASC"))
    ->get();

return view("detalleagregarProfesional",compact("profesionales","usuarios","vistas","instituciones","institucionnav"));
})->middleware('auth');
Route::post("/detalleagregarProfesional","ProfesionalPanelController@agregar")->middleware('auth');


//AGREGA EJE B:VICTIMA//

Route::get("/detalleagregarVictima",function(){
  $necesidades = App\Necesidad::all();
  $programas = App\Programa::all();
  $discapacidades = App\Discapacidad::all();
  $limitaciones = App\Limitacion::all();
  $victims= App\Victim::all();
  $vistas=App\Vista::all();
  $instituciones = App\Institucion::all();
  $institucionnav= App\Institucion::where("idCaso",session("idCaso"))->count();
  return view("detalleagregarVictima", compact("necesidades","programas","discapacidades","limitaciones","victims","vistas","instituciones","institucionnav"));
})->middleware('auth');
Route::post("/detalleagregarVictima","VictimaPanelController@agregar")->middleware('auth');
//AGREGA EJE C: CONVIVIENTES//

Route::get("/detalleagregarconviviente",function(){
    $convivientes = App\Conviviente::all();
    $vistas=App\Vista::all();
    $cantdeVictimas = App\Victim::where("idCaso",session("idCaso"))->count();
    $instituciones = App\Institucion::all();
    $victimActual = App\Victim::find(session("idVictim"));
    $casoActual = App\Caso::find(session("idCaso"));
     $institucionnav= App\Institucion::where("idCaso",session("idCaso"))->count();
     $convivientes_nuevos = App\Conviviente_nuevo::all();
  return view("detalleagregarconviviente",compact("convivientes_nuevos","cantdeVictimas","victimActual","convivientes","vistas","instituciones","institucionnav","casoActual"));
})->middleware('auth');
Route::post("/detalleagregarconviviente","ConvivientePanelController@agregar")->middleware('auth');


//AGREGA EJE E:IMPUTADO//
Route::get("/detalleagregarimputado",function(){
    $imputados = App\Imputado::all();
    $imputados_nuevos = App\Imputado_nuevo::all();
    $vistas=App\Vista::all();
     $casoActual = App\Caso::find(session("idCaso"));
    $cantdeVictimas = App\Victim::where("idCaso",session("idCaso"))->count();
     $instituciones = App\Institucion::all();
     $victimActual = App\Victim::find(session("idVictim"));
    $institucionnav= App\Institucion::where("idCaso",session("idCaso"))->count();
  return view("detalleagregarimputado",compact("cantdeVictimas","victimActual","imputados","vistas","instituciones","institucionnav","imputados_nuevos","casoActual"));
})->middleware('auth');
Route::post("/detalleagregarimputado","ImputadoPanelController@agregar")->middleware('auth');



// AGREGA EJE G:DOCUMENTO//
Route::get("/detalleagregarDocumento",function(){
    $documentos = App\Documento::all();
  return view("detalleagregarDocumento",compact("documentos"));
})->middleware('auth');
Route::post("/detalleagregarDocumento","DocumentoPanelController@agregar")->middleware('auth');
Route::get("/eliminardocumento/{id}", "DocumentoPanelController@eliminardocumento")->middleware('auth');
Route::get("/eliminardoc/{id}", "DocumentoPanelController@eliminardoc")->middleware('auth');
//Route::post("/agregarDocumento","DocumentoPanelController@agregar");
//AGREGA EJE G: INTERVENCION//

//----------------------------FIN RUTAS DE EDICION Y ELIMINACION ( PANEL DE CONTROL)-------------------------//

//-----------------------------------INICIO DE RUTA PANEL DE CONTROL-------------------------------//

Route::get("/paneldecontrol/{id}",function($id){

  $caso = App\Caso::find($id);


    $user = Auth::user();

if ($user->hasRole('admin')) {

 // checkPermisos($caso);

session(["idCaso" => $id]);
$casoNombre=App\Caso::find($id)->getnombre_referencia();
$delitos = App\Delito::all();
$cavajs = App\Cavaj::all();
$usuarios = App\Usuario::all();
$caso = App\Caso::find($id);
$hechos= App\Hecho::All();
$imputados = App\Imputado::all();
$convivientes = App\Conviviente::all();
$victimas=App\Victim::all();
$personas=App\Persona::all();
$profesionales=App\Profesional::all();
$idCaso=$id;
$documentos = App\Documento::all();
$instituciones = App\Institucion::all();
$institucion = App\Institucion::find($id);
$organismo = App\Institucion::where("idCaso",$id)->get();
$intervenciones = App\Intervencion::all();
$personas_nuevas = App\Persona_nueva::all();
$convivientes_nuevos=App\Conviviente_nuevo::all();
$imputados_nuevos=App\Imputado_nuevo::all();
$instituciocount= App\Institucion::where("idCaso",session("idCaso"))->count();
  return view("paneldecontrol",compact("imputados","casoNombre","convivientes","victimas","personas","profesionales", "caso","delitos","cavajs","usuarios","documentos","instituciones","hechos","intervenciones","organismo","idCaso","instituciocount","personas_nuevas","convivientes_nuevos","imputados_nuevos"));
}


if($user->hasRole('profesional')&&$caso->userID_create==$user->getId()) {

session(["idCaso" => $id]);
$casoNombre=App\Caso::find($id)->getnombre_referencia();
$delitos = App\Delito::all();
$cavajs = App\Cavaj::all();
$usuarios = App\Usuario::all();
$caso = App\Caso::find($id);
$hechos= App\Hecho::All();
$imputados = App\Imputado::all();
$convivientes = App\Conviviente::all();
$victimas=App\Victim::all();
$personas=App\Persona::all();
$profesionales=App\Profesional::all();
$documentos = App\Documento::all();
$instituciones = App\Institucion::all();
$intervenciones = App\Intervencion::all();
$personas_nuevas = App\Persona_nueva::all();
$convivientes_nuevos=App\Conviviente_nuevo::all();
$imputados_nuevos=App\Imputado_nuevo::all();
  return view("paneldecontrol",compact("imputados","casoNombre","convivientes","victimas","personas","profesionales", "caso","delitos","cavajs","usuarios","documentos","instituciones","hechos","intervenciones","personas_nuevas","convivientes_nuevos","imputados_nuevos"));
}



if($user->hasRole('user')&&$caso->sede==$user->getSede()) {

session(["idCaso" => $id]);
$casoNombre=App\Caso::find($id)->getnombre_referencia();
$delitos = App\Delito::all();
$cavajs = App\Cavaj::all();
$usuarios = App\Usuario::all();
$caso = App\Caso::find($id);
$hechos= App\Hecho::All();
$imputados = App\Imputado::all();
$convivientes = App\Conviviente::all();
$victimas=App\Victim::all();
$personas=App\Persona::all();
$profesionales=App\Profesional::all();
$documentos = App\Documento::all();
$instituciones = App\Institucion::all();
$intervenciones = App\Intervencion::all();
$personas_nuevas = App\Persona_nueva::all();
$convivientes_nuevos=App\Conviviente_nuevo::all();
$imputados_nuevos=App\Imputado_nuevo::all();
  return view("paneldecontrol",compact("imputados","casoNombre","convivientes","victimas","personas","profesionales", "caso","delitos","cavajs","usuarios","documentos","instituciones","hechos","intervenciones","personas_nuevas","convivientes_nuevos","imputados_nuevos"));
}
else{abort(403, "No tienes autorización para ingresar.");}})->middleware('auth');









//------------------------------FIN RUTA PANEL DE CONTROL------------------------------------------//
//------------------------------RUTA INFORME FINAL------------------------------------------//

Route::get("/informe/{id}",function($id){
    session(["idCaso" => $id]);

  $delitos = App\Delito::all();
  $cavajs = App\Cavaj::all();
  $usuarios = App\Usuario::all();
  $caso = App\Caso::find($id);
  $hechos= App\Hecho::All();
  $imputados = App\Imputado::all();
$convivientes = App\Conviviente::all();
$victimas=App\Victim::all();
$departamentos=App\Departamento::all();
$personas=App\Persona::all();
$ciudades=App\Ciudad::all();
$profesionales=App\Profesional::all();
$documentos = App\Documento::all();
$oarticulas = App\Oarticula::all();
$instituciones = App\Institucion::all();
$intervenciones = App\Intervencion::all();
$institucion_oarticulas = App\Institucion_Oarticula::all();
$provincias = App\Provincia::all();
$organismos = App\Organismo::all();
$casoActual = App\Caso::find(session("idCaso"));

  return view("informe",compact("organismos","provincias","ciudades","oarticulas","institucion_oarticulas","departamentos","casoActual","imputados","convivientes","victimas","personas","profesionales", "caso","delitos","cavajs","usuarios","documentos","instituciones","hechos","intervenciones"));
})->middleware('auth');

//------------------------------FIN RUTA INFORME demanda FINAL------------------------------------------//

Route::get("/informedemanda/{id}",function($id){
  session(["idDemanda" => $id]);
  $delitos = DB::table("delitos")
  ->select(DB::raw("*"))
  ->orderBy(DB::raw("nombre","ASC"))
  ->get();
  $cavajs = App\Cavaj::all();
$ciudades=App\Ciudad::all();
$documentos = App\Documento::all();
$provincias = App\Provincia::all();
$organismos = App\Organismo::all();
$demandaActual = App\Demanda::find($id);
$seguimientos = DB::table("seguimientos")
->select(DB::raw("*"))
->orderBy(DB::raw("fecha_seguimiento","ASC"))
->get();
$tipo_demandas = App\Tipo_demandas::all();
$oderivados = App\Oderivados::all();

  return view("informedemanda",compact("tipo_demandas","oderivados","seguimientos","organismos","provincias","ciudades","demandaActual","delitos","cavajs","documentos"));
})->middleware('auth');

Route::get("/informedemanda/deletedemanda/{id}", "DemandaController@eliminar")->middleware('auth');

Route::get("/demandaCaso/{id}", "DemandaController@PasarACaso")->middleware('auth');


//------------------------------FIN RUTA INFORME FINAL------------------------------------------//

//------------------------------FIN RUTA INFORME derivacion FINAL------------------------------------------//

Route::get("/informederivacion/{id}",function($id){
  session(["idDerivacion" => $id]);
  $delitos = DB::table("delitos")
  ->select(DB::raw("*"))
  ->orderBy(DB::raw("nombre","ASC"))
  ->get();
  $cavajs = App\Cavaj::all();
$ciudades=App\Ciudad::all();
$documentos = App\Documento::all();
$provincias = App\Provincia::all();
$organismos = App\Organismo::all();
$derivacionActual = App\Derivacion::find($id);
$seguimientos = DB::table("seguimientos")
->select(DB::raw("*"))
->orderBy(DB::raw("fecha_seguimiento","ASC"))
->get();
$tipo_demandas = App\Tipo_demandas::all();
$oderivados = App\Oderivados::all();

  return view("informederivacion",compact("tipo_demandas","oderivados","seguimientos","organismos","provincias","ciudades","derivacionActual","delitos","cavajs","documentos"));
})->middleware('auth');

Route::get("/informederivacion/deletederivacion/{id}", "DerivacionController@eliminar")->middleware('auth');

//------------------------------FIN RUTA INFORME FINAL------------------------------------------//

Auth::routes();
Route::get('/homePanel', 'HomePanelController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/register', function () {
    return Redirect::to("/")
        ->with('message', array('type' => 'success', 'text' => 'No es posible registrar usuarios '));
});

Route::get('/logout', function(){
    Session::flush();
    Auth::logout();
    return Redirect::to("/login")
      ->with('message', array('type' => 'success', 'text' => 'You have successfully logged out'));
});

//------------------------------DEMANDA------------------------------------------//
Route::get("/agregardemanda",function(){
  $provincias = App\Provincia::all();
  $ciudades = App\Ciudad::all();
  $delitos = DB::table("delitos")
  ->select(DB::raw("*"))
  ->orderBy(DB::raw("nombre","ASC"))
  ->get();
  $cavajs = App\Cavaj::all();
  $usuarios = App\Usuario::all();
  $organismos = App\Organismo::all();
  $departamentos = App\Departamento::all();
  return view("agregardemanda", compact("ciudades","provincias","delitos", "cavajs","usuarios","organismos","departamentos"));
})->middleware('auth');
Route::post("/agregardemanda","DemandaController@agregar")->middleware('auth');

//------------------------------DERIVACION------------------------------------------//

Route::get("/agregarderivacion",function(){
  $provincias = App\Provincia::all();
  $ciudades = App\Ciudad::all();
  $delitos = DB::table("delitos")
  ->select(DB::raw("*"))
  ->orderBy(DB::raw("nombre","ASC"))
  ->get();
  $tipo_demandas = App\Tipo_demandas::all();
  $oderivados = App\Oderivados::all();
  $organismos = App\Organismo::all();
  $seguimientos = App\Seguimiento::all();

  return view("agregarderivacion", compact("seguimientos","oderivados","ciudades","provincias","delitos", "tipo_demandas","organismos"));
})->middleware('auth');
Route::post("/agregarderivacion","DerivacionController@agregar")->middleware('auth');



Route::get("/agregarseguimiento/{id}",function($id){
  $delitos = DB::table("delitos")
  ->select(DB::raw("*"))
  ->orderBy(DB::raw("nombre","ASC"))
  ->get();
  $tipo_demandas = App\Tipo_demandas::all();
  $oderivados = App\Oderivados::all();
  $organismos = App\Organismo::all();
  $seguimientos = App\Seguimiento::all();
  session(["idDerivacion" => $id]);
  $derivacionActual = App\Derivacion::find(session("idDerivacion"));
  return view("agregarseguimiento", compact("derivacionActual","seguimientos","oderivados","ciudades","provincias","delitos", "tipo_demandas","organismos","departamentos"));
})->middleware('auth');
Route::post("/agregarseguimiento","DerivacionController@cargarSeguimiento")->middleware('auth');
