<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Caso;

class Profesional extends MiModelo
{
  public $table="profesionales";
  public $guarded=[];

  public function usuario() {
    return $this->belongsTo(Usuario::class, "nombre_profesional_interviniente");
  }

  public function casos(){
    return $this->hasOne(Caso::class,"id");
  }


public function getIdCaso()
  {
    return $this->idCaso;
  }




}
