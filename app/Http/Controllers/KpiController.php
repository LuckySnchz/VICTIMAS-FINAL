<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Caso;

class KpiController extends Controller
{
    public function index(){

      $grafico1 = DB::table("casos")
            ->select(DB::raw("COUNT(*) AS casos,
             YEAR(fecha_ingreso) AS año"))
            ->groupBy(DB::raw("YEAR(fecha_ingreso)"))
            ->get();


    $grafico2 = DB::table("casos")
          ->join("caso_cavaj","caso_id", "=", "casos.id")
          ->join("cavajs","cavaj_id","=", "cavajs.id")
          ->select(DB::raw("cavajs.nombre"), DB::raw("COUNT(*) AS casos"))
          ->whereRaw("YEAR(casos.`fecha_ingreso`) = 2019")
          ->groupBy(DB::raw("cavajs.nombre"))
          ->get();

      $grafico3 = DB::table("casos")
            ->join("caratulas","caso_id", "=", "casos.id")
            ->join("delitos","delito_id","=", "delitos.id")
            ->select(DB::raw("delitos.nombre"), DB::raw("COUNT(*) AS casos"))
            ->whereRaw("YEAR(casos.`fecha_ingreso`) = 2019")
            ->groupBy(DB::raw("delitos.nombre"))
            ->get();

      $nrodemandas = DB::table("casos")
      





          return view("kpi",compact("grafico1","grafico2","grafico3"));






    }


}
