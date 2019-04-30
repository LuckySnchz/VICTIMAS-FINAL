<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Cavaj;

class CavajController extends Controller
{
public function agregar(Request $form){


//$reglas = [];

//$mensajes=[];

//$this->validate($form,$reglas,$mensajes);
$cavaj= new Cavaj( );
$cavaj->Sede_Central_La_Plata = $form ["Sede_Central_La_Plata "];
$cavaj->Moron= $form ["Moron"];
$cavaj->Azul= $form ["Azul"];
$cavaj->Pergamino= $form ["Pergamino"];
$cavaj->Bahia_Blanca= $form ["Bahia_Blanca"];
$cavaj->Pilar= $form ["Pilar"];
$cavaj->Ezeiza= $form ["Ezeiza"];
$cavaj->Pinamar= $form ["Pinamar"];
$cavaj->Lanus= $form ["Lanus"];
$cavaj->Quilmes= $form ["Quilmes"];
$cavaj->Lomas_de_Zamora= $form ["Lomas_de_Zamora"];
$cavaj->San_Fernando= $form ["San_Fernando"];
$cavaj->Los_Toldos= $form ["Los_Toldos"];
$cavaj->San_Martin= $form ["San_Martin"];
$cavaj->Mar_del_Plata= $form ["Mar_del_Plata"];
$cavaj->Tandil= $form ["Tandil"];
$cavaj->Mercedes= $form ["Mercedes"];
$cavaj->Vicente_Lopez= $form ["Vicente_Lopez"];
$cavaj->Moreno= $form ["Moreno"];
$cavaj->Zarate= $form ["Zarate"];
$cavaj->Jose_C_Paz= $form ["Jose_C_Paz"];
$cavaj->Almirante_Brown= $form ["Almirante_Brown"];
$cavaj->La_Matanza= $form ["La_Matanza"];




//REVISAR QUE COINCIDAN NAME EN VIEW CON $form [""]; Y LOS ATRIBUTOS DE LA CLASE CON LAS COLUMNAS DE LA BD


$cavaj->save( );

//$guardarCavaj=$delitos->cavaj()->attach($form["cavaj"]);
//$vac=compact($guardarCavaj);
return redirect ("agregarcavaj");


}
}
