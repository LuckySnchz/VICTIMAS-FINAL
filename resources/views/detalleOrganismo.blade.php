
<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
      <link rel="stylesheet" href="css/app.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <title>Eje F: Atención del caso</title>
      <style>
      </style>
   </head>
   <header>
     @include('navbar')
      <div class="panel"style="background-color:rgb(137, 210, 14);text-align: center;margin-bottom: 0.1%">
                <a class="navbar-brand"  href="/paneldecontrol/{{session("idCaso")}}">
                    <h3 style="color:white">Panel de Control</h3>
                </a>
                </div>
     <br>
  
   </header>

   <body>
      <h1 class="text-center" style="padding: 15px;">Eje F: Atención del caso.</h1>
      <section class="container jumbotron shadow p-3 mb-5 bg-white rounded">
      <form class="" action="/detalleOrganismo" method="post">
      {{ csrf_field() }}
      <input type="hidden" name="idCaso" value="{{session("idCaso")}}">
    <input type="hidden" name="idOrganismo" value="{{session("idOrganismo")}}">
    <input type="hidden" name="userID_modify" value="{{$institucion->userID_modify}}">

<!-F1 Intervino otro organismo previamente->

  <div class="form-group" {{ $errors->has('organismos_intervinieron') ? 'has-error' : ''}}>
  <label for="modalidad_ingreso">F 1.¿intervinieron otros organismos previamente?</label>
  <select class="form-control" name="organismos_intervinieron" id="organismos_intervinieron" onChange="selectOnChangeF1(this)" >
        <option value="" selected=disabled>Seleccionar...</option>
        @if($organismos_intervinieron == 1)<option value="1" selected>Sí</option>
        @else<option value="1" >Sí</option>@endif

        @if($organismos_intervinieron == 2)<option value="2" selected>No. Intervino solo el organismo que derivó </option>
        @else<option value="2" >No. Intervino solo el organismo que derivó </option>@endif
  </select><br>
  {!! $errors->first('organismos_intervinieron', '<p class="help-block" style="color:red";>:message</p>') !!}
  </div>


  @if($organismos_intervinieron == 1)

  <div class="organismos_previos_si" id="organismos_previos_si" {{ $errors->has('oprevios') ? 'has-error' : ''}}>
  @foreach ($oprevios as $oprevio)
      <label class="form-check-inline form-check-label">
       
          @if ($institucion->opreviosIds()->contains($oprevio->id))
        <input type="checkbox" value="{{ $oprevio->id }}" class="form-check-inline oprevio2" name="oprevios[]" checked>
        @else
        <input type="checkbox" value="{{ $oprevio->id }}" class="form-check-inline oprevio2" name="oprevios[]">
        @endif
     
      {{ $oprevio->nombre }}
      </label><br>
  @endforeach
  {!! $errors->first('oprevios', '<p class="help-block" style="color:red";>:message</p>') !!}
  </div>

  @else
    <div class="organismos_previos_si" style="display:none" id="organismos_previos_si">
    @foreach ($oprevios as $oprevio)
        <label class="form-check-inline form-check-label">
        <input type="checkbox" value="{{ $oprevio->id }}" class="form-check-inline oprevio2" name="oprevios[]">
        {{ $oprevio->nombre }}
        </label><br>
    @endforeach

    </div>
  @endif


@if ($institucion->opreviosIds()->contains(24))
  <div id="cualF1" {{ $errors->has('cual_otro_organismo') ? 'has-error' : ''}}>
@else
  <div id="cualF1" style="display: none">
@endif

  <label for="">Cuál?</label>
  <input class="form-control" name="cual_otro_organismo" id="cual_otro_organismoF1" type="text" value="{{$cual_otro_organismo}}">
  {!! $errors->first('cual_otro_organismo', '<p class="help-block" style="color:red";>:message</p>') !!}
  </div>
  <br>
  </div>


  <script>
     function selectOnChangeF1(sel) {
      if (sel.value=="1"){
          divC = document.getElementById("organismos_previos_si");
          divC.style.display = "";}

          if (sel.value=="2"){
            divC = document.getElementById("organismos_previos_si");
            divC.style.display = "none";
            var checkboxes = divC.querySelectorAll('input');


            checkboxes.forEach(function (oneCheckbox) {
              oneCheckbox.checked = false;
            })

            document.querySelector('#cualF1').style.display = 'none';

       
      }}

  </script>

  <script type="text/javascript">
    var oprevios = document.querySelectorAll(".oprevio2")
    var otro = oprevios[oprevios.length-1]

    otro.onclick = function(){

        $("#cualF1").toggle();
       

     }
  </script>

  <!-F2 Asistencia requerida->

    <div class="form-group" {{ $errors->has('requiere_asistencia') ? 'has-error' : ''}}>
    <label for="patrocinio">F 2.Requiere algún tipo de asistencia?</label>
    <select class="form-control" name="requiere_asistencia" onChange="selectOnChangeF2(this)">
        <option value=""selected=disabled>Seleccionar...</option>
        @if($requiere_asistencia == 1) <option value="1" selected>Sí</option>
        @else<option value="1">Sí</option>@endif

        @if($requiere_asistencia == 2) <option value="2" selected>No</option>
        @else<option value="2">No</option>@endif

    </select>
    {!! $errors->first('requiere_asistencia', '<p class="help-block" style="color:red";>:message</p>') !!}
    </div>
    <br>

    
    @if($requiere_asistencia == 1)
      <div class="AunoDosF2" id="asistencia" {{ $errors->has('asistencia') ? 'has-error' : ''}}>
    @else
      <div class="AunoDosF2" id="asistencia"style="display:none">
    @endif


      <!--<label>F 2 I. Tipo de asistencia requerida:</label>
      <label for="">En caso de requerir, tildar todas las opciones que considere correspondientes.</label><br>
 
      @if($asistencia_juridica == 1)
        <input type="checkbox" value="1" class="form-check-inline" name="asistencia[]" id="Jurídica" checked>
        <label for="Jurídica" class="form-check-inline form-check-label">Jurídica</label><br>
      @else
        <input type="checkbox" value="1" class="form-check-inline" name="asistencia[]" id="Jurídica">
        <label for="Jurídica" class="form-check-inline form-check-label">Jurídica</label><br>
      @endif

       @if($asistencia_psicologica == 2)
        <input type="checkbox" value="2" class="form-check-inline" name="asistencia[]" id="Psicológica" checked>
        <label for="Psicológica" class="form-check-inline form-check-label">Psicológica</label> <br>
      @else
        <input type="checkbox" value="2" class="form-check-inline" name="asistencia[]" id="Psicológica">
        <label for="Psicológica" class="form-check-inline form-check-label">Psicológica</label> <br>
      @endif
    
       @if($asistencia_socioeconomica == 3)
        <input type="checkbox" value="3" class="form-check-inline" name="asistencia[]"  id="checkeadosocioeco"  onchange="socioecono(this)" checked>
        <label for="Socioeconomica" class="form-check-inline form-check-label" >Socioeconomica</label>
      @else
        <input type="checkbox" value="3" class="form-check-inline" name="asistencia[]"  id="checkeadosocioeco"  onchange="socioecono(this)" >
        <label for="Socioeconomica" class="form-check-inline form-check-label" >Socioeconomica</label>
      @endif
        <br><br>
{!! $errors->first('asistencia', '<p class="help-block" style="color:red";>:message</p>') !!}
</div>-->

  @if ($asistencia_socioeconomica==3)

    <div id="socioeco" {{ $errors->has('socioeconomicos') ? 'has-error' : ''}}>
    <label>F 2 II. Tipo de asistencia socioeconómica:</label>
    <label for="">En caso de requerir, tildar todas las opciones que considere correspondientes.</label><br>
      @foreach ($socioeconomicos as $socioeconomico)
        <label class="form-check-inline form-check-label">
          @if ($institucion->socioeconomicosIds()->contains($socioeconomico->id))
        <input type="checkbox" value="{{ $socioeconomico->id }}" class="form-check-inline socioOtro" name="socioeconomicos[]" checked>
      @else
        <input type="checkbox" value="{{ $socioeconomico->id }}" class="form-check-inline socioOtro" name="socioeconomicos[]">
      @endif
        {{ $socioeconomico->nombre }}
      </label><br>
      @endforeach
      {!! $errors->first('socioeconomicos', '<p class="help-block" style="color:red";>:message</p>') !!}
    <br>
  </div>


  @else
    <div id="socioeco" style="display:none" >
    <label>F 2I. Tipo de asistencia socioeconómica:</label>
    <label for="">En caso de requerir, tildar todas las opciones que considere correspondientes.</label><br>
      @foreach ($socioeconomicos as $socioeconomico)
        <label class="form-check-inline form-check-label">
        <input type="checkbox" value="{{ $socioeconomico->id }}" class="form-check-inline socioOtro" name="socioeconomicos[]">
        {{ $socioeconomico->nombre }}
      </label><br>
      @endforeach
  </div>

  @endif


</div>
   @if ($institucion->socioeconomicosIds()->contains(6))
    <div id="cualF2I" {{ $errors->has('socioeconomica_otro') ? 'has-error' : ''}}>
    <label for="socioeconomica_otro_cualF2I">Cuál?:</label>
    <input class="form-control" name="socioeconomica_otro" type="text" id="socioeconomica_otro_cualF2I">
    {!! $errors->first('socioeconomica_otro', '<p class="help-block" style="color:red";>:message</p>') !!}
    </div>
  @else
    <div id="cualF2I"style="display:none">
    <label for="socioeconomica_otro_cualF2I">Cuál?:</label>
    <input class="form-control"value="{{$socioeconomica_otro}}" name="socioeconomica_otro" type="text" id="socioeconomica_otro_cualF2I">
    </div>
  @endif
<script type="text/javascript">

   function socioecono(checkbox)
   {
       if (checkbox.checked)
       {  divC = document.getElementById("socioeco");
                                divC.style.display="";
           
           }else{

           divC = document.getElementById("socioeco");
                                divC.style.display="none";
                               var checkboxes = divC.querySelectorAll('input');
 var checkboxes = divC.querySelectorAll('input');


            checkboxes.forEach(function (oneCheckbox) {
              oneCheckbox.checked = false;
            })

            document.querySelector('#cualF2I').style.display = 'none';

            document.querySelector('#socioeconomica_otro_cualF2I').value = '';
      


           
   }}

</script>

  <script>
           function selectOnChangeF2(sel) {
                          if (sel.value=="1"){
                              divC = document.getElementById("asistencia");
                              divC.style.display = "";

                            }

                              else{
                                divC = document.getElementById("asistencia");
                                divC.style.display = "none";
                              document.getElementById("Jurídica").checked= false;
                              document.getElementById("Psicológica").checked= false;
                              document.getElementById("checkeadosocioeco").checked= false;

                              divf2 = document.getElementById("socioeco");
                              divf2.style.display = "none";
                              var checkboxes = divf2.querySelectorAll('input');


                              checkboxes.forEach(function (oneCheckbox) {
                                oneCheckbox.checked = false;
                              })

                              document.querySelector('#cualF2I').style.display = 'none';

                              document.querySelector('#socioeconomica_otro_cualF2I').value = '';
                              }


                        }


         </script>



  <script type="text/javascript">
    var socio = document.querySelectorAll(".socioOtro")
    var otro2 = socio[socio.length-1]

    otro2.onclick = function(){
        $("#cualF2I").toggle();
        document.querySelector('#socioeconomica_otro_cualF2I').value = '';



     }
  </script>



  <!-F3 Organismo que articula->

  <div class="form-group" {{ $errors->has('organismo_articula_si_no') ? 'has-error' : ''}}>
  <label>F 3.¿Actualmente articula con algún organismo?</label>
  <select class="form-control" name="organismo_articula_si_no" id="organismo_articula_si_no" onChange="selectOnChangeF3A(this)" >
        <option value="" selected=disabled>Seleccionar...</option>
        @if($organismo_articula_si_no == 1)<option value="1" selected>Sí</option>
        @else<option value="1" >Sí</option>@endif

        @if($organismo_articula_si_no == 2)<option value="2" selected>No</option>
        @else<option value="2" >No</option>@endif

          @if($organismo_articula_si_no == 3)<option value="3" selected>Se desconoce</option>
          @else<option value="3" >Se desconoce</option>@endif

  </select><br>
  {!! $errors->first('organismo_articula_si_no', '<p class="help-block" style="color:red";>:message</p>') !!}
  </div>




@if($organismo_articula_si_no == 1)

  <div class="form-group"  id="organismo_articula_si" {{ $errors->has('oarticulas') ? 'has-error' : ''}}>
  @else
    <div class="form-group" id="organismo_articula_si" style="display:none">
    @endif

  <div >
  <label>F 3 1. Organismos con los que se articula actualmente:</label>
  <label for="">En caso de requerir, tildar todas las opciones que considere correspondientes.</label><br>
  <div class="Auno">
    @foreach ($oarticulas as $oarticula)
    <label class="form-check-inline form-check-label">
       @if ($institucion->oarticulasIds()->contains($oarticula->id))
      
        <input type="checkbox" value="{{ $oarticula->id }}" class="form-check-inline oarticula2" name="oarticulas[]" checked>
        @else
        <input type="checkbox" value="{{ $oarticula->id }}" class="form-check-inline oarticula2" name="oarticulas[]">
        @endif
    {{ $oarticula->nombre }}
    </label><br>
    @endforeach

  </div>
  </div>
  {!! $errors->first('oarticulas', '<p class="help-block" style="color:red";>:message</p>') !!}
  </div>


@if ($institucion->oarticulasIds()->contains(24))
  <div id="cualF3" {{ $errors->has('organismos_actual_otro') ? 'has-error' : ''}}>
@else
<div id="cualF3"style="display:none">
@endif
  <label for="organismos_actual_otro_cualF4">Cuál?:</label>
  <input class="form-control" name="organismos_actual_otro" type="text" id="organismos_actual_otro_cualF3" value="{{$organismos_actual_otro}}">
  {!! $errors->first('organismos_actual_otro', '<p class="help-block" style="color:red";>:message</p>') !!}
  </div>


  <script>
     function selectOnChangeF3A(sel) {
      if (sel.value=="1"){
          divC = document.getElementById("organismo_articula_si");
          divC.style.display = "";}


          if (sel.value=="2"||sel.value=="3"){
            divC = document.getElementById("organismo_articula_si");
            divC.style.display = "none";
            var checkboxes = divC.querySelectorAll('input');


            checkboxes.forEach(function (oneCheckbox) {
              oneCheckbox.checked = false;
            })

            document.querySelector('#cualF3').style.display = 'none';

            document.querySelector('#organismos_actual_otro_cualF3').value = '';
      }


     }

  </script>

  <script type="text/javascript">
    var oprevios = document.querySelectorAll(".oarticula2")
    var otro = oprevios[oprevios.length-1]

    otro.onclick = function(){
        $("#cualF3").toggle();
        document.querySelector('#organismos_actual_otro_cualF3').value = '';
        



     }
  </script>


  <!-F4 Tiene abogado particular->

    <div class="form-group" {{ $errors->has('abogado_particular') ? 'has-error' : ''}}>
    <label for="abogado_particular">F 4.¿Cuenta con abogado particular?:</label>
    <select class="form-control" onChange="selectOnChangeF4(this)" name="abogado_particular" id="abogado_particular">

      <option value="0" selected=disabled>Seleccionar...</option>

      @if($abogado_particular == 1) <option value="1" selected>Sí</option> @else<option value="1" >Sí</option>@endif
      @if($abogado_particular == 2) <option value="2" selected>No</option>
      @else<option value="2" >No</option>@endif
      @if($abogado_particular == 3) <option value="3" selected>Se desconoce</option>
      @else<option value="3">Se desconoce</option>@endif
    </select>
    {!! $errors->first('abogado_particular', '<p class="help-block" style="color:red";>:message</p>') !!}
    </div>

@if($abogado_particular == 1)
  <div class="form-group" id="Patro" style="display:none">
  @else
    <div class="form-group" id="Patro" style="display:block">
  @endif

<script type="text/javascript">
function selectOnChangeF4(sel) {
 if (sel.value=="2" || sel.value=="3"){
     divf4 = document.getElementById("Patro");
     divf4.style.display = "";}

     else {
       divf4 = document.getElementById("Patro");
       divf4.style.display = "none";
       $('#pratocinio_gratuito').val('0');
       $('#fecha_de_solicitud').val('');
       document.getElementById("bloqueof5").checked=false;


     }
     }
</script>



<!-F5 Patrocinio jurídico->

  <div class="form-group"  {{ $errors->has('pratocinio_gratuito') ? 'has-error' : ''}}>
  <label for="patrocinio">F 5.Patrocinio jurídico gratuito:</label>
  <select class="form-control" name="pratocinio_gratuito" id="pratocinio_gratuito" onChange="selectOnChangeF6(this)">
      <option value="0" selected=disabled>Seleccionar...</option>
      @if($pratocinio_gratuito == 1) <option value="1" selected>Requiere</option>
      @else<option value="1">Requiere</option>@endif

      @if($pratocinio_gratuito == 2) <option value="2" selected>A la espera de designación</option>
      @else<option value="2">A la espera de designación</option>@endif

      @if($pratocinio_gratuito == 3) <option value="3" selected>Designado</option>
      @else<option value="3">Designado</option>@endif

      @if($pratocinio_gratuito == 4) <option value="4" selected>No requiere</option>
      @else<option value="4">No requiere</option>@endif
  </select>
  {!! $errors->first('pratocinio_gratuito', '<p class="help-block" style="color:red";>:message</p>') !!}
  </div>

  @if($pratocinio_gratuito == 1 || $pratocinio_gratuito == 2)
    <div class="form-group" id="solicitud" {{ $errors->has('fecha_de_solicitud') ? 'has-error' : ''}}>
  @else
    <div class="form-group" id="solicitud" style="display:none">
  @endif
  <label>F 5 I. Fecha de solicitud:</label>
  <input type="date" class="form-control" name="fecha_de_solicitud" id="fecha_de_solicitud" value="{{old("fecha_de_solicitud")}}">
  <label for="bloqueo1" class="form-check-label">Se desconoce</label>
  <input type="checkbox" onchange="checkf51(this)" id="bloqueof5" name="fecha_de_solicitud" value="{{$fecha_de_solicitud}}">
  {!! $errors->first('fecha_de_solicitud', '<p class="help-block" style="color:red";>:message</p>') !!}
  </div>

  <script type="text/javascript">
  function selectOnChangeF6(sel) {
   if (sel.value=="1" || sel.value=="2"){
       divf4 = document.getElementById("solicitud");
       divf4.style.display = "";}

       else {
         divf4 = document.getElementById("solicitud");
         divf4.style.display = "none";
         $('#fecha_de_solicitud').val('');
         document.getElementById("bloqueof5").checked=false;
         document.getElementById('fecha_de_solicitud').removeAttribute("readonly");


       }


if (sel.value=="3"){
       divf5 = document.getElementById("cualF6");
       divf5.style.display = "";

       divf5 = document.getElementById("conformidad");
       divf5.style.display = "";
       divf5 = document.getElementById("colegio");
       divf5.style.display = "";
       divf5 = document.getElementById("fecha_designacion");
       divf5.style.display = "";}

       else {
         document.getElementById("designado").removeAttribute("readonly");
          document.getElementById("bloqueo5").checked=false;
          $("#designado").val("");
          divfd = document.getElementById("cualF6");
          divfd.style.display = "none";


        $("#pratocinio_gratuito-designado").val("");
        divfc= document.getElementById("conformidad");
        divfc.style.display = "none";


     $('#colegio_departamental').val('');

        divf55= document.getElementById("colegio");
       divf55.style.display = "none";




        $("#fecha_designacion_del_letrado").val("");

    divf555= document.getElementById("fecha_designacion");

    divf555.style.display = "none";
        }



       }
  </script>
<script type="text/javascript">

   function checkf51(checkbox)
   {
       if (checkbox.checked)
       {
           $('#fecha_de_solicitud').val('1900-01-01');
           document.getElementById('fecha_de_solicitud').setAttribute("readonly", "readonly");
       }else
           {
               $('#fecha_de_solicitud').val('');
               document.getElementById('fecha_de_solicitud').removeAttribute("readonly");
           }
   }

</script>



  @if($pratocinio_gratuito == 3)
    <!-F5 1>
  <div id="cualF6" {{ $errors->has('letrado_designado') ? 'has-error' : ''}}>
  <label for="letrado_designado">F 5 I. Nombre y Apellido del letrado designado:</label>
  <input type="text" class="form-control" name="letrado_designado" id="designado" value="{{$letrado_designado}}">
  <label  class="form-check-label">Se desconoce</label>
  <input type="checkbox" id="bloqueo5" name="letrado_designado" value="Se desconoce" onchange="checkC111(this)">
  {!! $errors->first('letrado_designado', '<p class="help-block" style="color:red";>:message</p>') !!}
  </div>

   <script>
                     function checkC111(checkbox)
                     {
                         if (checkbox.checked)
                             {
                                 $('#designado').val('Se desconoce');
                                 document.getElementById('imputado_nombre_y_apellido').setAttribute("readonly", "readonly");

                             }else
                                 {
                                     $('#designado').val('');
                                     document.getElementById('imputado_nombre_y_apellido').removeAttribute("readonly");
                                 }
                     }
                  </script>
  <br><br>
    <!-F5 2>
  <div class="form-group " id="conformidad" {{ $errors->has('pratocinio_conformidad') ? 'has-error' : ''}}>
  <label for="pratocinio_conformidad">F 4 II.¿La víctima está conforme con la asistencia recibida por parte del letrado designado?:</label>
  <select class="form-control" name="pratocinio_conformidad" id="pratocinio_gratuito-designado" >
  <option value="" selected=disabled>Seleccionar...</option>
          @if($pratocinio_conformidad == 1) <option value="1" selected>Sí</option>
          @else<option value="1" >Sí</option>@endif
          @if($pratocinio_conformidad == 2) <option value="2" selected>No</option>
          @else<option value="2" >No</option>@endif
          @if($pratocinio_conformidad == 3) <option value="3" selected>Se desconoce</option>
          @else<option value="3">Se desconoce</option>@endif
  </select>
  {!! $errors->first('pratocinio_conformidad', '<p class="help-block" style="color:red";>:message</p>') !!}
  </div>
  <br>
    <!-F5 3>
  <div class="form-group" id="colegio" {{ $errors->has('colegio_departamental') ? 'has-error' : ''}}>
  <label for="colegio_departamental">F 4 III.Colegio Departamental:</label>
  <select class="form-control" name="colegio_departamental" id="colegio_departamental">

   <option value="" selected=disabled>Seleccionar...</option>
    @foreach ($departamentos as $departamento)
      @if($colegio_departamental==$departamento->id)
      <option selected value="{{ $departamento->id }}">{{ $departamento->nombre}}</option>
    @else <option  value="{{ $departamento->id }}">{{ $departamento->nombre}}</option>
    @endif
  @endforeach
  </select>
  {!! $errors->first('colegio_departamental', '<p class="help-block" style="color:red";>:message</p>') !!}
  </div>
  <br>
    <!-F5 4>
  <div class="form-group" id="fecha_designacion" {{ $errors->has('fecha_designacion') ? 'has-error' : ''}}>
  <label for="">F 4 IV. Fecha de designación: </label>
  <input type="date" class="form-control" id="fecha_designacion_del_letrado" name="fecha_designacion" value="{{$fecha_designacion}}" ><br>
  {!! $errors->first('fecha_designacion', '<p class="help-block" style="color:red";>:message</p>') !!}
  </div>

  @else

  <div id="cualF6" style="display:none">
  <label for="letrado_designado">F 4 I. Nombre y Apellido del letrado designado:</label>
  <input type="text" class="form-control" name="letrado_designado" id="designado" value="{{old("letrado_designado")}}">
  <label  class="form-check-label">Se desconoce</label>
  <input type="checkbox" id="bloqueo5" name="letrado_designado" value="Se desconoce" onchange="checkC111(this)">
  <script>
       function checkC111(checkbox)
       {
           if (checkbox.checked)
               {
                   $('#designado').val('Se desconoce');
                   document.getElementById('designado').setAttribute("readonly", "readonly");
               }else
                   {
                       $('#designado').val('');
                       document.getElementById('designado').removeAttribute("readonly");
                   }
       }
    </script>
  <br><br>
  </div>

  <div class="form-group " id="conformidad" style="display:none">
  <label for="pratocinio_conformidad">F 4 II.¿La víctima está conforme con la asistencia recibida por parte del letrado designado?:</label>
  <select class="form-control" name="pratocinio_conformidad" id="pratocinio_gratuito-designado" >
  <option value="" selected=disabled>Seleccionar...</option>
          <option value="1" >Sí</option>
          <option value="2" >No</option>
          <option value="3">Se desconoce</option>
  </select>
  </div>

  <div class="form-group" id="colegio" style="display:none">
  <label for="colegio_departamental">F 4 III.Colegio Departamental:</label>
  <select class="form-control" name="colegio_departamental" id="colegio_departamental">
    <option value=""selected=disabled>Seleccionar...</option>
    @foreach ($departamentos as $departamento)
      @if(old("colegio_departamental")==$departamento->id)
      <option selected value="{{ $departamento->id }}">{{ $departamento->nombre}}</option>
    @else <option  value="{{ $departamento->id }}">{{ $departamento->nombre}}</option>
    @endif
  @endforeach
  </select>
  </div>
  <div class="form-group" id="colegio" style="display:none">
  <label for="colegio_departamental">F 4 III.Colegio Departamental:</label>
  <select class="form-control" name="colegio_departamental" id="colegio_departamental">
    <option value="" selected=disabled>Seleccionar...</option>
    @foreach ($departamentos as $departamento)
      @if(old("colegio_departamental")==$departamento->id)
      <option selected value="{{ $departamento->id }}">{{ $departamento->nombre}}</option>
    @else <option  value="{{ $departamento->id }}">{{ $departamento->nombre}}</option>
    @endif
  @endforeach
  </select>
  </div>
  <div class="form-group" id="fecha_designacion" style="display:none">
  <label for="">F 4 IV. Fecha de designación: </label>
  <input type="date" class="form-control" id="fecha_designacion_del_letrado" name="fecha_designacion" value="{{old("fecha_designacion")}}" ><br>
</div>

  @endif

  </div>


            <script>
               function muestroCualF2I() {
                   var checkBox = document.getElementById("checkeadoF2I");
                   var text = document.getElementById("cualF2I");
                   if (checkBox.checked == true){
                       text.style.display = "block";
                   } else {
                      $('#socioeconomica_otro_cualF2I').val('');
                      text.style.display = "none";
                   }
               }

            </script>
            <script>
               function muestrosocioeco(){
                   var checkBox = document.getElementById("checkeadosocioeco");
                   var text = document.getElementById("socioeco");
                   if (checkBox.checked == true){
                       text.style.display = "block";
                   } else {
                      document.getElementById("Salud").checked= false;
                      document.getElementById("Educacion").checked= false;
                      document.getElementById("Trabajo").checked= false;
                      document.getElementById("Vivienda").checked= false;
                      document.getElementById("Vincular").checked= false;
                      document.getElementById("checkeadoF2I").checked= false;
                      $('#socioeconomica_otro_cualF2I').val('');
                      var text2 = document.getElementById("cualF2I");
                      text.style.display = "none";
                       text2.style.display = "none";
                   }
               }

            </script>
            <script>
               function muestroCualF4() {
                   var checkBox = document.getElementById("checkeadoF4");
                   var text = document.getElementById("cualF4");
                   if (checkBox.checked == true){
                       text.style.display = "block";
                   } else {
                      $('#organismos_actual_otro_cualF4').val('');
                      text.style.display = "none";
                   }
               }

            </script>
            <script>
               function checkD2(checkbox)
               {
                   if (checkbox.checked)
                   {
                       $('#victima_fecha_hecho').val('1900-01-01');
                       document.getElementById('victima_fecha_hecho').setAttribute("readonly", "readonly");
                   }else
                       {
                           $('#victima_fecha_hecho').val('');
                           document.getElementById('victima_fecha_hecho').removeAttribute("readonly");
                       }
               }
            </script>
      </section>
      <div class="botones">
      <div class="btn-1"> <button type="submit" style="color:white; background-color:rgb(137, 210, 14)" class="btn col-xl" name="button">SIGUIENTE</button><br><br></div>

            </div>
         </form>

   </body>
</html>
