
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
      <link rel="stylesheet" href="css/app.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <title>Eje G: Informe de seguimiento</title>
      <style>
         .Auno,.Ados{float: left;
         width: 40%
         }
         .AunoDos{overflow: hidden;margin-left: 1%}
      </style>
   </head>

   <header>
     @include('navbar')
     <br>

   </header>
   <body>

    <h1 class="text-center" style="padding: 15px;">Eje G: Informe de seguimiento</h1>

    <div class="divpersona" id="divpersona">  <h2 class="text-center" style="padding: -20px;"></h2></div>

    <section class="container" >

    <form class="" action="/agregarIntervencion" method="post">
      {{csrf_field()}}
    <input type="hidden" name="idCaso" value="{{session("idCaso")}}">



<!-ENCABEZADO>
<div class="container jumbotron shadow p-3 mb-5 bg-white rounded">

<h4>Resumen</h4><br>

<div>
  <label class="font-weight-bold">Nombre de referencia: </label>
  {{$casoActual->nombre_referencia}}
</div>

@if($casoActual->nro_carpeta == NULL)
<div style="display:none">
@else
  <div style="display:block">
@endif
  <label class="font-weight-bold">Nro de carpeta: </label>
  {{$casoActual->nro_carpeta}}
</div>

<div>
<label class="font-weight-bold">Tipo de delito: </label>
@foreach ($delitos as $delito)
  @if($delito->id == $casoActual->delito)
    {{$delito->nombre}}
  @endif
@endforeach
</div>

<div>
  <label class="font-weight-bold">Descripción del caso: </label>
  {{$casoActual->descripcion_caso}}
</div>

<div>
  <label class="font-weight-bold">Fecha de ingreso: </label>
  {{date("d/m/y",strtotime($casoActual->fecha_ingreso))}}
</div>

<div>
  <label class="font-weight-bold"> Modalidad de ingreso: </label>
  @if ($casoActual->modalidad_ingreso==1)
    Presentación espontánea
  @elseif ($casoActual ->modalidad_ingreso==2) Intervención de oficio
  @else Derivación de otro organismo
  @endif
</div>

@if($casoActual ->modalidad_ingreso==3)
<div style="display:block">
@else
<div style="display:none">
@endif
<label class="font-weight-bold">Organismo que derivó: </label>
    @foreach ($organismos as $organismo)
      @if ($organismo->id == $casoActual->organismo)
        {{$organismo->nombre}}
      @endif
    @endforeach
</div>

<div>
  <label class="font-weight-bold">Cavaj interviniente: </label>
@foreach ($cavajs as $cavaj)
  @if ($cavaj->id == $casoActual->cavaj)
    {{$cavaj->nombre}}
  @endif
@endforeach
</div>

<div>
  <label class="font-weight-bold">Comisaría interviniente: </label>
  {{$casoActual ->comisaria}}
</div>

<div>
  <label class="font-weight-bold">¿Hubo denuncias previas vinculadas a la temática del tipo de delito actual?: </label>
  @if($casoActual ->denuncias_previas == 1) Sí
  @elseif($casoActual ->denuncias_previas == 2) No</option>
  @else Se desconoce
  @endif
</div>

<div>
  <label class="font-weight-bold">Departamento Judicial: </label>
  @foreach ($departamentos as $departamento)
    @if($departamento->id == $casoActual ->departamento_judicial)
      {{$departamento->nombre}}
    @endif
  @endforeach
</div>

<div>
  <label class="font-weight-bold">Estado: </label>
  @if($casoActual ->estado == 1) Activo
  @else Pasivo
  @endif
</div>

@if($casoActual ->estado==2)
<div style="display:block">
@else
<div style="display:none">
  @endif
  <label class="font-weight-bold">Motivo pasivo: </label>
  @if ($casoActual->motivospasivos==1) No hay demanda
  @elseif ($casoActual ->motivospasivos==2) Deja de requerir intervención
  @elseif ($casoActual ->motivospasivos==3) Imposibilidad de contacto
  @elseif ($casoActual ->motivospasivos==4) Sentencia judicial
  @else Otro
  @endif
</div>

@if($casoActual ->motivospasivos==5)
<div style="display:block">
@else
<div style="display:none">
@endif
  <label class="font-weight-bold">Otro motivo pasivo: </label>
  {{$casoActual ->cual_otro_motivospasivo}}
</div>

<div>
  <label class="font-weight-bold">Nombre y apellido de la victima: </label>
  {{$casoActual ->nombre_y_apellido_de_la_victima}}
</div>



<div>
<label class="font-weight-bold">Tipo de fecha del hecho: </label>
@if($casoActual->fecha_delito == 1) Fecha específica
@elseif($casoActual->fecha_delito == 2) Otro
@else Se desconoce
@endif
</div>

@if($casoActual->fecha_delito == 1)
<div style="display:block">
@else<div style="display:none">
@endif
<label class="font-weight-bold">Fecha del hecho: </label>
{{date("d/m/y",strtotime($casoActual->fecha_hecho))}}
</div>

@if($casoActual->fecha_delito == 2)
<div style="display:block">
@else<div style="display:none">
@endif
    <label class="font-weight-bold">Descripción del periodo de fechas del hecho: </label>
    {{$casoActual->fecha_hecho_otro}}
    </div>

    <div>
    <label class="font-weight-bold">País del hecho: </label>
    @if($casoActual->pais_hecho == 1) Argentina
    @else Otro país
    @endif
    </div>

    <div>
    <label class="font-weight-bold">Provincia del hecho: </label>
    @foreach ($provincias as $provincia)
        @if($provincia->id == $casoActual->provincia_hecho)
      {{$provincia->nombre}}
    @else
    @endif
    @endforeach
    </div>

    <div>
    <label class="font-weight-bold">Ciudad del hecho: </label>
    @foreach ($ciudades as $ciudad)
        @if($ciudad->id == $casoActual->localidad_hecho)
      {{$ciudad->localidad_nombre}}
    @else
    @endif
    @endforeach

    </div>

    <br>

<br>

<!-ARTICULACION CON ORGANISMOS>

<h4>Articulación con organismos</h4><br>

@foreach($instituciones as $instituto)
@if ($instituto->idCaso == $casoActual->id)

      @if($casoActual->instituciones->organismo_articula_si_no == 1)
      <div style="display:block">
      @else<div style="display:none">
      @endif
      <label class="font-weight-bold">Organismos con los que se articula actualmente: </label>
      {{$casoActual->instituciones->oarticulas->implode("nombre", " / ")}}
      </div>

      @if($casoActual->instituciones->organismos_actual_otro == NULL)
      <div style="display:none">
      @else<div style="display:block">
      @endif
      <label class="font-weight-bold">Otro organismo con el que se articula: </label>
      {{$casoActual->instituciones->organismos_actual_otro}}
      </div>

  @endif
@endforeach




<!-AGREGAR INTERVENCION>

<br><h4>Intervenciones</h4><br>

<div>

 @foreach($intervenciones as $intervencion)
     @if ($intervencion->idCaso == session("idCaso"))
       <li>
         {{$intervencion->fecha_intervencion . " - " . $intervencion->detalle_intervencion}}
       </li>
     @endif
 @endforeach

</div>
<a href="javascript:if(window.print)window.print()">Imprimir</a>

</div>

<div class="form-group"
        {{ $errors->has('intervencion') ? 'has-error' : ''}}>
        <label for="modalidad_ingreso">Desea Agregar Intervención:</label>



             <select class="form-control" name="intervencion" id="intervencion" onChange="selectOnChangeA5A(this)">
                  <option value="" selected=disabled>Seleccionar...</option>
                  @if (old("intervencion")==1)
                    <option value="1" selected>Sí</option>
                  @else <option value="1" >Sí</option>
                  @endif

                  @if (old("intervencion")==2)
                    <option value="2" selected>No</option>
                  @else <option value="2" >No</option>
                  @endif

        </select><br>
         
    {!! $errors->first('intervencion', '<p class="help-block" style="color:red";>:message</p>') !!}


    @if (old("intervencion") == 1) <div id="agregar_intervencion_si" {{ $errors->has('agregar_intervencion_si') ? 'has-error' : ''}}>
    @else
    <div id="agregar_intervencion_si" style="display: none">
    @endif

    <div class="form-group" {{ $errors->has('fecha_intervencion') ? 'has-error' : ''}}>
      <label>Fecha intervención: </label>
      <input type="date" name="fecha_intervencion" class="form-control" value="{{old("fecha_intervencion")}}">
      {!! $errors->first('fecha_intervencion', '<p class="help-block" style="color:red";>:message</p>') !!}
      </div>

      <div class="form-group" {{ $errors->has('detalle_intervencion') ? 'has-error' : ''}}>
      <label>Detalle intervención: </label>
      <textarea class="form-control" name="detalle_intervencion" value="{{old("detalle_intervencion")}}" rows="8" cols="80"></textarea>
      {!! $errors->first('detalle_intervencion', '<p class="help-block" style="color:red";>:message</p>') !!}
      </div>

  
    {!! $errors->first('agregar_intervencion_si', '<p class="help-block" style="color:red";>:message</p>') !!}
      <div id="botones" >
  <div class="btn-1" > <button class="btn btn-primary col-xl" name="button" style="width:108%" >Agregar</button><br><br></div>
  </div>
    </div>
    </div>
  </div>



<!BOTONES>

  
      </form>
</section>

      <div class="btn-4">   <button style="width:100%" class="btn btn-danger col-xl" name="button" onclick="window.open('home', 'width=800,height=600')"; >FINALIZAR CARGA DE CASO - HOME</button><br><br></div>
 <script>
           function selectOnChangeA5A(sel) {


            if (sel.value=="1"){
              divC = document.getElementById("agregar_intervencion_si");
              
              divC.style.display = "";
            }else{
              divC = document.getElementById("agregar_intervencion_si");
     
              divC.style.display="none";
            }
           }

        </script>



      </body>
</html>



