<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends MiModelo
{
  public $table="usuarios";
  public $timestamps=false;
  public $guarded=[];


   public function profesional() {
    return $this->belongsTo(Profesional::class, "id");
  }

}
?>
