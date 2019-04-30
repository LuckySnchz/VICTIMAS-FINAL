<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Caso;
class Delito extends MiModelo
{
  public $table="delitos";
  public $timestamps=false;
  public $guarded=[];

  public function casos() {
    $this->belongsToMany(Caso::class,"caratulas","delito_id","caso_id");
  }
}
