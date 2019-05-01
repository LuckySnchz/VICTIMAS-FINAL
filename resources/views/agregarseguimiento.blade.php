
<?php
session_start();
 ?>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="https:fonts.googleapis.com/css?family=Muli" rel="stylesheet">
      <link rel="stylesheet" href="https:stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
      <link rel="stylesheet" href="css/app.css">
      <script src="https:ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <title>Derivación de casos</title>
      <style>
         .Auno,.Ados{float: left;
         width: 40%
         }
         .AunoDos{overflow: hidden;margin-left: 1%}
      </style>
   </head>
   <header>

    @include('navbar')

   </header>
   <body>
      <h1 class="text-center" style="padding: 15px;">Seguimiento de derivaciones</h1>

      <section class="container jumbotron shadow p-3 mb-5 bg-white rounded">

        <!-resumen de derivación>

        <br><h4>Resumen de derivación</h4><br>

        <div>
        <label class="font-weight-bold">Fecha de ingreso: </label>
        {{date("d/m/y",strtotime($derivacionActual->fecha_ingreso))}}
        </div>

        <div>
          <label class="font-weight-bold">Nombre y apellido: </label>
          {{$derivacionActual->nombre_y_apellido}}
        </div>

        <div>
          <label class="font-weight-bold">Contacto: </label>
          {{$derivacionActual->contacto}}
        </div>

        <div>
          <label class="font-weight-bold">Tipo de demanda: </label>
        @foreach ($tipo_demandas as $demanda)
          @if ($demanda->id == $derivacionActual->tipo_demanda)
            {{$demanda->nombre}}
          @endif
        @endforeach
        </div>

        @if($derivacionActual ->tipo_demanda==17)
        <div style="display:block">
        @else
        <div style="display:none">
        @endif
        <label class="font-weight-bold">Otro tipo de demanda: </label>
            {{$derivacionActual->otra_demanda}}
          </div>


          <div>
            <label class="font-weight-bold"> Modalidad de ingreso: </label>
            @if ($derivacionActual->modalidad_ingreso==1) Presentación espontánea
            @elseif ($derivacionActual ->modalidad_ingreso==2) Intervención de oficio
            @elseif ($derivacionActual ->modalidad_ingreso==3) Derivación de otro organismo
            @else Se desconoce
            @endif
          </div>

          @if($derivacionActual ->modalidad_ingreso==3)
          <div style="display:block">
          @else
          <div style="display:none">
          @endif
          <label class="font-weight-bold">Organismo que derivó: </label>
              @foreach ($organismos as $organismo)
                @if ($organismo->id == $derivacionActual->organismo)
                  {{$organismo->nombre}}
                @endif
              @endforeach
            </div>

            <div>
              <label class="font-weight-bold">Organismo al que se deriva: </label>
            @foreach ($oderivados as $derivado)
              @if ($derivado->id == $derivacionActual->derivacion)
                {{$derivado->nombre}}
              @endif
            @endforeach
            </div>

            <div>
              <label class="font-weight-bold"> Estado de derivación: </label>
              @if ($derivacionActual->estado_derivacion==1) Resuelta
              @elseif ($derivacionActual ->estado_derivacion==2) En proceso
              @else Imposibilidad de contacto
              @endif
            </div>


        @if ($errors->any())
          <div class="alert alert-danger">
          <p>Debes completar todo el <strong>formulario</strong> para continuar</p>
          </div>
        @endif


  <!-Seguimientos>

  <br><h4>Seguimiento</h4><br>

  <div>

   @foreach($seguimientos as $seguimiento)
       @if ($seguimiento->idDerivacion == session("idDerivacion"))
         <li>
           {{$seguimiento->fecha_seguimiento . " - " . $seguimiento->detalle_seguimiento}}
         </li>
       @endif
   @endforeach

  </div>

<br>
<br>
  </div>
  <div id="seguimiento-form" style="display:none">

    <form class="" action="/agregarseguimiento" method="post">
      {{csrf_field()}}
      <input type="hidden" name="idDerivacion" value="{{session("idDerivacion")}}">


        <div class="form-group" {{ $errors->has('fecha_seguimiento') ? 'has-error' : ''}}>
        <label>Fecha seguimiento: </label>
        <input type="date" name="fecha_seguimiento" class="form-control" value="{{old("fecha_seguimiento")}}">
        {!! $errors->first('fecha_seguimiento', '<p class="help-block" style="color:red";>:message</p>') !!}
        </div>

        <div class="form-group" {{ $errors->has('detalle_seguimiento') ? 'has-error' : ''}}>
        <label>Detalle seguimiento: </label>
        <textarea class="form-control" name="detalle_seguimiento" rows="8" cols="80"></textarea>
        {!! $errors->first('detalle_seguimiento', '<p class="help-block" style="color:red";>:message</p>') !!}
        </div>

        <div class="botones" style="overflow:hidden;width:100%;margin-left:45%">
        <div class="btn-1" style="width:10%;float:left"> <button type="submit" class="btn btn-primary col-xs" name="button">Guardar</button><br><br></div>
        </div>
        </form>

  </div>
  <script>
     function openInterv(sel) {

          divC = document.getElementById("seguimiento-form");
          divC.style.display = ""

      }

  </script>

  <!BOTONES>

        <div class="botones" >
        <div class="btn-1"> <button style="width:100%" onclick="openInterv(this)" class="btn btn-primary col-xl" name="button"  >Agregar Seguimiento</button><br><br></div>
        </div>
        </form>

      </section>
  </body>
</html>
