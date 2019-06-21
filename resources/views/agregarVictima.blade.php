
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
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      <title>Eje B: Caracterización de la victima y su contexto</title>
      <style>
      </style>
   </head>
   <header>
     @include('navbar')
<div class="panel"style="background-color:rgb(137, 210, 14);text-align: center;margin-bottom: 0.1%;margin-top: 0.2%">
                <a class="navbar-brand"  href="/home">
                    <h3 style="color:white">INICIO</h3>
                </a>
                </div>

   </header>
   <body>

     <h1 class="text-center" style="padding: 15px;">Eje B: Caracterización de la victima y su contexto</h1>

     <section class="container jumbotron shadow p-3 mb-5 bg-white rounded">


       <ul>
           @foreach($victims as $victim)
             @if ($victim->idCaso == session("idCaso"))
               <li>

                       {{$victim->victima_nombre_y_apellido}}

               </li>
             @endif
           @endforeach
       </ul>




    <form class="" action="/agregarVictima" method="post">
        {{csrf_field()}}
    <input type="hidden" name="idCaso" value="{{session("idCaso")}}">

<!B1 Victima Nombre y Apellido>

    <div class="form-group"{{ $errors->has('victima_nombre_y_apellido') ? 'has-error' : ''}}>
    <input type="hidden" name="idCaso" value="{{session("idCaso")}}">

    <label for="">B 1. Nombre y apellido:</label>
    <input type="text" class="form-control" name="victima_nombre_y_apellido" id="victima_nombre_y_apellido" value="{{old('victima_nombre_y_apellido')}}">
    
    <label for="bloqueo1" class="form-check-label">Se desconoce</label>
    <input type="checkbox" id="bloqueo1" name="victima_nombre_y_apellido" value="Se desconoce" onchange="checkC1(this)">
    {!! $errors->first('victima_nombre_y_apellido', '<p class="help-block" style="color:red";>:message</p>') !!}
    </div>

    <script>
         function checkC1(checkbox)
         {
             if (checkbox.checked)
                 {
                     $('#victima_nombre_y_apellido').val('Se desconoce');
                     document.getElementById('victima_nombre_y_apellido').setAttribute("readonly", "readonly");
                 }else
                     {
                         $('#victima_nombre_y_apellido').val('');
                         document.getElementById('victima_nombre_y_apellido').removeAttribute("readonly");
                     }
         }
      </script>

<!B2 Género>

    <div class="form-group"{{ $errors->has('genero') ? 'has-error' : ''}}>
    <label for="">B 2. Género:</label>
    <select class="form-control" name="genero" onChange="selectOnChangeB2(this)">
        <option value="" selected=disabled>Seleccionar...</option>
        @if((old("genero")==1))
        <option value="1" selected>Mujer Cis</option>
        @else
        <option value="1">Mujer Cis</option>
        @endif

        @if ((old("genero")==2))
        <option value="2" selected>Mujer Trans</option>
        @else
        <option value="2" >Mujer Trans</option>
        @endif

        @if ((old("genero")==3))
        <option value="3" selected>Varon Cis</option>
        @else
        <option value="3" >Varon Cis</option>
        @endif

        @if ((old("genero")==4))
        <option value="4" selected>Varon Trans</option>
        @else
        <option value="4" >Varon Trans</option>
        @endif

        @if ((old("genero")==5))
        <option value="5" selected>Otro</option>
        @else
        <option value="5" >Otro</option>
        @endif
    </select>
    {!! $errors->first('genero', '<p class="help-block" style="color:red";>:message</p>') !!}
    </div>



<!B3 Fecha de nacimiento>

    <div class="form-group"{{ $errors->has('victima_fecha_nacimiento') ? 'has-error' : ''}}>
    <label for="">B 3. Fecha de nacimiento: </label>
    <input type="date" class="form-control" id="victima_fecha_nacimiento" name="victima_fecha_nacimiento" value="{{old('victima_fecha_nacimiento')}}">
    <label for="bloqueo3" class="form-check-label">Se desconoce</label>
    <input type="checkbox" id="bloqueo3" name="victima_fecha_nacimiento_desconoce" value="Se desconoce" onchange="checkB3(this)">
    {!! $errors->first('victima_fecha_nacimiento', '<p class="help-block" style="color:red";>:message</p>') !!}
    </div>

      <script>
         function checkB3(checkbox)
         {
             if (checkbox.checked)
             {
                 $('#victima_fecha_nacimiento').val('1900-01-01');
                 document.getElementById('victima_fecha_nacimiento').setAttribute("readonly", "readonly");
             }else
                 {
                     $('#victima_fecha_nacimiento').val('');
                     document.getElementById('victima_fecha_nacimiento').removeAttribute("readonly");
                 }
         }
      </script>

<!B4 Edad>


    <div class="form-group"{{ $errors->has('victima_edad') ? 'has-error' : ''}}>

    @if(old('victima_edad')=="0")
      <label for="victima_edad">B 4. Edad:</label>
    <input name="victima_edad"  style="background-color: #e9ecef;color:black"value="{{old('victima_edad')}}" onchange="mostrarValorB4(this.value);" id="victima_edad" class="form-control" type="text" readonly="readonly"/><br>


    <label class="form-check-label" >Se desconoce</label>
    <input name="victima_edad" value="0" id="bloqueo1" type="checkbox" checked onchange="checkB4(this)">


    @else

  <label for="victima_edad">B 4. Edad:</label>
    <input name="victima_edad" style="background-color: white;color: black" value="{{old('victima_edad')}}" onchange="mostrarValorB4(this.value);" id="victima_edad" class="form-control" type="text"><br>
    <label class="form-check-label" >Se desconoce</label>
    <input name="victima_edad" value="0" id="bloqueo1" type="checkbox" onchange="checkB4(this)">
  @endif

    {!! $errors->first('victima_edad', '<p class="help-block" style="color:red";>:message</p>') !!}
    </div>


</script>

<script type="text/javascript">
       function checkB4(checkbox) {
          if (checkbox.checked)
                {
                    $('#victima_edad').val('Se Desconoce');
                    document.getElementById('victima_edad').setAttribute("readonly","readonly");
                    document.getElementById('victima_edad').style.background="#e9ecef";
                    $('#franjaetaria_id').val('7');

                    divAY= document.getElementById("victima_edad").disabled=true;

           }
           else{
                    $('#victima_edad').val('');
                    document.getElementById('victima_edad').style.background="white";
                    document.getElementById('victima_edad').removeAttribute("readonly");
                    $('#franjaetaria_id').val('').disabled=false;
                  divA = document.getElementById("victima_edad").disabled=false;

           }}
    </script>


<!B5 Franja Etaria>

    <div class="form-group"{{ $errors->has('franjaetaria') ? 'has-error' : ''}}>
    <label for="">B 5. Franja Etaria</label>
    <select name="franjaetaria" id="franjaetaria_id" class="form-control" value="">
          <option value="" selected=disabled>Seleccionar...</option>
            @if(old("franjaetaria") == 1) <option value="1" selected>0 a 11 años</option> @else <option value="1">0 a 11 años</option> @endif
            @if(old("franjaetaria") == 2) <option value="2" selected>12 a 18 años</option> @else <option value="2" >12 a 18 años</option> @endif
            @if(old("franjaetaria") == 3) <option value="3" selected>19 a 30 años</option> @else <option value="3" >19 a 30 años</option> @endif
            @if(old("franjaetaria") == 4) <option value="4" selected>31 a 50 años</option> @else <option value="4" >31 a 50 años</option> @endif
            @if(old("franjaetaria") == 5) <option value="5" selected>51 a 65 años</option> @else <option value="5" >51 a 65 años</option> @endif
            @if(old("franjaetaria") == 6) <option value="6" selected>65 años o más</option>@else <option value="6" >65 años o más</option> @endif
            @if(old("franjaetaria") == 7) <option value="7" selected>Se desconoce</option> @else <option value="7" >Se desconoce</option> @endif
          <!-- no hago un array en este caso porque toma los valores una funcion de javascript -->
    </select>
    {!! $errors->first('franjaetaria', '<p class="help-block" style="color:red";>:message</p>') !!}
    </div>
    <!-- de acuerdo al valor que se seleccione le asigno una franja etaria  -->
    <script type="text/javascript">
       var mostrarValorB4 = function(x){
        if(x==0){
            dicv=document.getElementById('victima_edad').value=1;
        }
       if(x<12){
           document.getElementById('franjaetaria_id').value=1;


       }
       if(x>11){if(x<19){

       	document.getElementById('franjaetaria_id').value=2;}
       }

       if(x>18){if(x<31){
       	document.getElementById('franjaetaria_id').value=3;}
       }

       if(x>30){if(x<51){
       	document.getElementById('franjaetaria_id').value=4;}
       }

       if(x>50){if(x<66){
       	document.getElementById('franjaetaria_id').value=5;}
       }

       if(x>65){
       	document.getElementById('franjaetaria_id').value=6;}
       }
    </script>

<!B6 Documentación>

    <div class="form-group"{{ $errors->has('tienedoc') ? 'has-error' : ''}}>
    <label for="">B 6. ¿Cuenta con alguna documentación que permita acreditar su identidad?:</label>
    <select class="form-control" name="tienedoc" onChange="selectOnChangeB6(this)">
            <option value="" selected=disabled>Seleccionar...</option>
            @if (old("tienedoc") == 1)<option value="1" selected>Posee</option> @else <option value="1">Posee</option> @endif

            @if (old("tienedoc") == 3)<option value="3" selected>No posee</option>
            @else <option value="3" >No posee</option> @endif

            @if (old("tienedoc") == 5)<option value="5" selected>En tramite</option> @else <option value="5">En tramite</option>@endif

            @if (old("tienedoc") == 6)<option value="6" selected>Se desconoce</option> @else<option value="6" >Se desconoce</option> @endif
    </select>
    {!! $errors->first('tienedoc', '<p class="help-block" style="color:red";>:message</p>') !!}
    </div>



 <script>
         function selectOnChangeB6(sel) {
          if (sel.value=="1"||sel.value=="5"){
              divV = document.getElementById("que_doc");
              divV.style.display = "";
              divV = document.getElementById("que_doc8");
              divV.style.display = "";}


              if (sel.value=="3"||sel.value=="6"){
                divV = document.getElementById("que_doc");
                divV.style.display = "none";
                divV = document.getElementById("que_doc8");
                divV.style.display = "none";
                divVC = document.getElementById("cual_b2");
              $('#victima_tipo').val('');
              divVC.style.display="none";
              $('#tipodocumento_id').val('0');


          }
         }
      </script>



<!B7 Tipo documentación>


    @if (old("tienedoc") == 1) <div id="que_doc" {{ $errors->has('tipodocumento') ? 'has-error' : ''}}>
    @else
    <div id="que_doc" style="display: none">
    @endif

    <label for="">B 7. Tipo de documentación:</label>
    <select class="form-control" id="tipodocumento_id" name="tipodocumento" onChange="selectOnChangeB7(this)">
        <option value="0" selected=disabled>Seleccionar...</option>
        @if(old("tipodocumento") ==1)<option value="1" selected>D.N.I.</option> @else<option value="1" >D.N.I.</option>@endif

        @if(old("tipodocumento") ==2)<option value="2" selected>Documento Extranjero</option>
        @else<option value="2">Documento Extranjero</option>@endif

        @if(old("tipodocumento") ==3)<option value="3" selected>Libreta Cívica</option>
        @else<option value="3">Libreta Cívica</option>@endif

        @if(old("tipodocumento") ==4)<option value="4" selected>Libreta de Enrolamiento</option>
        @else<option value="4" >Libreta de Enrolamiento</option>@endif

        @if(old("tipodocumento") ==5)<option value="5" selected>Pasaporte</option>
        @else<option value="5">Pasaporte</option>@endif

        @if(old("tipodocumento") ==6)<option value="6" selected>Residencia Precaria</option>
        @else<option value="6">Residencia Precaria</option> @endif

        @if(old("tipodocumento") ==7)<option value="7" selected>Se Desconoce</option>
        @else<option value="7">Se Desconoce</option> @endif

        @if(old("tipodocumento") ==8)<option value="8" selected>No posee</option>
        @else<option value="8">No posee</option>@endif

        @if(old("tipodocumento") ==9)<option value="9" selected>Otro</option>
        @else<option value="9">Otro</option>@endif
    </select>
    {!! $errors->first('tipodocumento', '<p class="help-block" style="color:red";>:message</p>') !!}
    </div>

    @if (old("tipodocumento") == 9) <div id="cual_b2" {{ $errors->has('tipo_documento_otro') ? 'has-error' : ''}}>
    @else
    <div id="cual_b2" style="display: none">
    @endif
    <label for="">Cuál?</label>
    <input name="tipo_documento_otro"  id="victima_tipo" class="form-control" type="text" value="{{old("tipo_documento_otro")}}" onclick="cual_b5()">
    {!! $errors->first('tipo_documento_otro', '<p class="help-block" style="color:red";>:message</p>') !!}
    </div>
    </div>


    @if (old("tipodocumento") == 6) <div id="cual_b14">
    @else <div id="cual_b14" style="display: none">
    @endif

    <label for="">B 7.I Estado de la residencia precaria</label>
    <select class="form-control" id="residenciaprecaria_id" name="residenciaprecaria" class="form-control">
            <option value="" selected=disabled>Seleccionar...</option>
            @if(old("residenciaprecaria") == 1)<option value="1" selected>Vigente</option>
            @else <option value="1">Vigente</option>@endif

            @if(old("residenciaprecaria") == 2)<option value="2" selected>Vencida</option>
            @else <option value="2">Vencida</option>@endif

            @if(old("residenciaprecaria") == 3)<option value="3" selected>Se desconoce</option>
            @else <option value="3">Se desconoce</option>@endif
    </select>
    {!! $errors->first('residenciaprecaria', '<p class="help-block" style="color:red";>:message</p>') !!}
    <br>
    </div>
        <script>
           function selectOnChangeB7(sel) {
                              if (sel.value=="6"){
                                  divC = document.getElementById("cual_b14");
                                  divC.style.display = "";
                              }else{
                                  divC = document.getElementById("cual_b14");
                                  $('#residenciaprecaria_id').val('');
                                  divC.style.display="none";
                              }

           	if (sel.value=="9"){
           		divC = document.getElementById("cual_b2");
           		divC.style.display = "";
           	}else{
           		divC = document.getElementById("cual_b2");
           		$('#victima_tipo').val('');
           		divC.style.display="none";
           	}
           }

        </script>

<!B8 Nro documento>

  @if (old("tienedoc") == 1) <div id="que_doc8" {{ $errors->has('tipodocumento') ? 'has-error' : ''}}>
    @else
    <div id="que_doc8" style="display: none">
    @endif
    <div class="form-group" {{ $errors->has('victima_numero_documento') ? 'has-error' : ''}}>


    @if(old('victima_numero_documento')=="0")

 <label for="">B 8. Nro Documento:</label>
    <input name="victima_numero_documento" value="{{old('victima_numero_documento')}}"   id="victima_numero_documento" class="form-control"style="background-color: #e9ecef;color:black" type="text" readonly="readonly"/><br>

    <label class="form-check-label" >Se desconoce</label>
    <input name="victima_numero_documento" value="0" id="bloqueo1" type="checkbox" checked onchange="checkB8(this)">

    @else
     <label for="">B 8. Nro Documento:</label>
        <input name="victima_numero_documento" style="background-color: white;color:black" value="{{old('victima_numero_documento')}}"   id="victima_numero_documento" class="form-control" type="text"><br>

    <label class="form-check-label" >Se desconoce</label>
    <input name="victima_numero_documento" value="0" id="bloqueo1" type="checkbox" onchange="checkB8(this)">
  @endif

    {!! $errors->first('victima_numero_documento', '<p class="help-block" style="color:red";>:message</p>') !!}
    </div>
</div>



<script type="text/javascript">
       function checkB8(checkbox) {
          if (checkbox.checked)
                {
                    $('#victima_numero_documento').val('Se Desconoce');
                    document.getElementById('victima_numero_documento').setAttribute("readonly","readonly");
                      document.getElementById('victima_numero_documento').style.background="#e9ecef";
                    divAY= document.getElementById("victima_numero_documento").disabled=true;

           }
           else{
                    $('#victima_numero_documento').val('');
document.getElementById('victima_numero_documento').style.background="white";
                    document.getElementById('victima_numero_documento').removeAttribute("readonly");
                  divA = document.getElementById("victima_numero_documento").disabled=false;

           }}
    </script>



<!B9 Nivel educativo>

    <div class="form-group"{{ $errors->has('niveleducativo') ? 'has-error' : ''}}>
    <label for="">B 9. Máximo nivel educativo alcanzado:</label>
    <select class="form-control" name="niveleducativo">
          <option value="" selected=disabled>Seleccionar...</option>
          @if(old("niveleducativo") == 1)<option value="1" selected>Sin instrucción formal</option>
          @else <option value="1" >Sin instrucción formal</option>@endif

          @if(old("niveleducativo") == 2)<option value="2" selected>Primario incompleto</option>
          @else <option value="2" >Primario incompleto</option>@endif

          @if(old("niveleducativo") == 3)<option value="3" selected>Primario completo</option>
          @else <option value="3" >Primario completo</option>@endif

          @if(old("niveleducativo") == 4)<option value="4" selected>Secundario incompleto</option>
          @else <option value="4" >Secundario incompleto</option>@endif

          @if(old("niveleducativo") == 5)<option value="5" selected>Secundario completo</option>
          @else <option value="5">Secundario completo</option>@endif

          @if(old("niveleducativo") == 6)<option value="6" selected>Terciario-Universitario incompleto</option>
          @else <option value="6" >Terciario-Universitario incompleto</option>@endif

          @if(old("niveleducativo") == 7) <option value="7" selected>Terciario-Universitario completo</option>
          @else <option value="7" >Terciario-Universitario completo</option>@endif

          @if(old("niveleducativo") == 8) <option value="8" selected>Se desconoce</option>
          @else<option value="8" >Se desconoce</option>@endif
    </select>
    {!! $errors->first('niveleducativo', '<p class="help-block" style="color:red";>:message</p>') !!}
    </div>

<!B10 Condiciones de trabajo>

  <div class="form-group"{{ $errors->has('condiciones_de_trabajo') ? 'has-error' : ''}}>
  <label for="modalidad_id">B 10.Condiciones de trabajo:</label>
  <select class="form-control" name="condiciones_de_trabajo" id="condiciones_de_trabajo">
      <option value="" selected=disabled>Seleccionar...</option>
      @if(old("condiciones_de_trabajo") == 1) <option value="1" selected>Desocupado(a)</option>
      @else <option value="1" >Desocupado(a)</option>@endif

      @if(old("condiciones_de_trabajo") == 2) <option value="2" selected>Empleo informal</option>
      @else <option value="2" >Empleo informal</option>@endif

      @if(old("condiciones_de_trabajo") == 3) <option value="3" selected>Empleo formal</option>
      @else <option value="3" >Empleo formal</option>@endif

      @if(old("condiciones_de_trabajo") == 4) <option value="4" selected>Población Inactiva (jubilados, menores de edad, pensionados, etc.)</option>
      @else <option value="4" >Población Inactiva (jubilados, menores de edad, pensionados, etc.)</option>@endif

      @if(old("condiciones_de_trabajo") == 5) <option value="5" selected>Se desconoce</option>
      @else <option value="5" >Se desconoce</option>@endif
  </select>
  {!! $errors->first('condiciones_de_trabajo', '<p class="help-block" style="color:red";>:message</p>') !!}
  </div>

<!B11 Necesidades insatisfechas>

  <div class="form-group"{{ $errors->has('necesidades_socioeconomicas_insatisfechas') ? 'has-error' : ''}}>
  <label for="modalidad_id">B 11.¿Tiene necesidades socioeconómicas insatisfechas?:</label>
  <select class="form-control" name="necesidades_socioeconomicas_insatisfechas" id="necesidades_insatisfechas" onChange="selectOnChangeB11(this)">
              <option value="" selected=disabled>Seleccionar...</option>
              @if(old("necesidades_socioeconomicas_insatisfechas") == 1)<option value="1" selected>Sí</option>
              @else<option value="1" >Sí</option>@endif
              @if(old("necesidades_socioeconomicas_insatisfechas") == 2)<option value="2" selected>No</option>
              @else<option value="2" >No</option>@endif
              @if(old("necesidades_socioeconomicas_insatisfechas") == 3)<option value="3" selected>Se desconoce</option>
              @else<option value="3" >Se desconoce</option>@endif
  </select>
  {!! $errors->first('necesidades_socioeconomicas_insatisfechas', '<p class="help-block" style="color:red";>:message</p>') !!}
  </div>

@if(old("necesidades_socioeconomicas_insatisfechas") == 1)
  <div class="form-group" id="necesidades_insatisfechas_si"
  {{ $errors->has('necesidades') ? 'has-error' : ''}}>
  <label>B 11 I. Necesidades socioeconómicas insatisfechas: </label><br>
  <label>En caso de requerir, tildar todas las opciones que considere correspondientes.</label><br>
              @foreach ($necesidades as $necesidad)
                <label class="form-check-inline form-check-label">
                  @if(is_array(old("necesidades")) && in_array($necesidad->id, old("necesidades")))
                    <input type="checkbox" value="{{ $necesidad->id }}" id="{{ $necesidad->id }}" class="form-check-inline neceSocio" name="necesidades[]" checked>
                  @else

                <input type="checkbox" value="{{ $necesidad->id }}" id="{{ $necesidad->id }}" class="form-check-inline neceSocio" name="necesidades[]">
              @endif
                {{ $necesidad->nombre }}
                </label><br>
              @endforeach


  {!! $errors->first('necesidades', '<p class="help-block" style="color:red";>:message</p>') !!}
  </div>

@else
  <div class="form-group" id="necesidades_insatisfechas_si" style="display:none">
  <label>B 11 I. Necesidades socioeconómicas insatisfechas: </label><br>
  <label>En caso de requerir, tildar todas las opciones que considere correspondientes.</label><br>
              @foreach ($necesidades as $necesidad)
                <label class="form-check-inline form-check-label">
                @if(is_array(old("necesidades")) && in_array($necesidad->id, old("necesidades")))
                  <input type="checkbox" value="{{ $necesidad->id }}" class="form-check-inline neceSocio" name="necesidades[]" checked>
                @else
                <input type="checkbox" value="{{ $necesidad->id }}" class="form-check-inline neceSocio" name="necesidades[]">
                @endif
                {{ $necesidad->nombre }}
                </label><br>
              @endforeach
  </div>
  @endif

  @if (is_array(old("necesidades")) && in_array("8", old("necesidades")))
    <div id="cualB11" {{ $errors->has('necesidades_socioeconomicas_insatisfechas_otro') ? 'has-error' : ''}}>
    <label for="">Cual?</label>
    <input type="text" class="form-control" name="necesidades_socioeconomicas_insatisfechas_otro" value="{{old("necesidades_socioeconomicas_insatisfechas_otro")}}" id="necesidades_insatisfechas_otro">
    {!! $errors->first('necesidades_socioeconomicas_insatisfechas_otro', '<p class="help-block" style="color:red";>:message</p>') !!}
    </div><br>
  @else

  <div id="cualB11" style="display:none">
  <label for="">Cual?</label>
  <input type="text" class="form-control" name="necesidades_socioeconomicas_insatisfechas_otro" value="{{old("necesidades_socioeconomicas_insatisfechas_otro")}}" id="necesidades_insatisfechas_otro">
  </div><br>
  @endif

  <script type="text/javascript">
    var varios = document.querySelectorAll(".neceSocio")

    var otro = varios[varios.length-1]

    otro.onclick = function(){
       $('#necesidades_insatisfechas_otro').val('');
        $("#cualB11").toggle()



     }
  </script>


         <script>
            function selectOnChangeB11(sel) {
             if (sel.value=="1"){
                 divC = document.getElementById("necesidades_insatisfechas_si");
                 divC.style.display = "";}


                 if (sel.value=="2"||sel.value=="3"){
                   divC = document.getElementById("necesidades_insatisfechas_si");
                   divC.style.display = "none";
                   var checkboxes = divC.querySelectorAll('input');


                   checkboxes.forEach(function (oneCheckbox) {
                     oneCheckbox.checked = false;
                   })

                   document.querySelector('#cualB11').style.display = 'none';

                   document.querySelector('#necesidades_insatisfechas_otro').value = '';
             }}

         </script>



  <!B12 Programa o subsidio social>

   <div class="form-group"{{ $errors->has('programa_subsidio') ? 'has-error' : ''}}>
   <label for="modalidad_id">B 12.¿Percibe algún tipo de programa o subsidio social?:</label>
   <select class="form-control" name="programa_subsidio" id="programa_subsidio" onChange="selectOnChangeB12(this)">
              <option value="" selected=disabled>Seleccionar...</option>
              @if(old("programa_subsidio") == 1)<option value="1" selected>Sí</option>
              @else<option value="1" >Sí</option>@endif
              @if(old("programa_subsidio") == 2)<option value="2" selected>No</option>
              @else<option value="2" >No</option>@endif
              @if(old("programa_subsidio") == 3)<option value="3" selected>Se desconoce</option>
              @else<option value="3" >Se desconoce</option>@endif
  </select>
  {!! $errors->first('programa_subsidio', '<p class="help-block" style="color:red";>:message</p>') !!}
  </div>

@if(old("programa_subsidio") == 1)
  <div class="form-group" id="programa_subsidio_si"
  {{ $errors->has('programas') ? 'has-error' : ''}}>
 <label>B 12 I. ¿Cuál?  </label><br>
   <label class="" >En caso de requerir, tildar todas las opciones que considere correspondientes.</label><br>
              @foreach ($programas as $programa)
                <label class="form-check-inline form-check-label">
                  @if(is_array(old("programas")) && in_array($programa->id, old("programas")))
                    <input type="checkbox" value="{{ $programa->id }}" id="{{ $programa->id }}" class="form-check-inline progra2" name="programas[]" checked>
                  @else

                <input type="checkbox" value="{{ $programa->id }}" id="{{ $programa->id }}" class="form-check-inline progra2" name="programas[]">
              @endif
                {{ $programa->nombre }}
                </label><br>
              @endforeach


  {!! $errors->first('programas', '<p class="help-block" style="color:red";>:message</p>') !!}
  </div>

@else
  <div class="form-group" id="programa_subsidio_si" style="display:none">
<label>B 12 I. ¿Cuál?  </label><br>
   <label class="" >En caso de requerir, tildar todas las opciones que considere correspondientes.</label><br>
              @foreach ($programas as $programa)
                <label class="form-check-inline form-check-label">
                @if(is_array(old("programas")) && in_array($programa->id, old("programas")))
                  <input type="checkbox" value="{{ $programa->id }}" class="form-check-inline progra2" name="programas[]" checked>
                @else
                <input type="checkbox" value="{{ $programa->id }}" class="form-check-inline progra2" name="programas[]">
                @endif
                {{ $programa->nombre }}
                </label><br>
              @endforeach
              </div>
              @endif

  @if (is_array(old("programas")) && in_array("5", old("programas")))
    <div id="cualB12" {{ $errors->has('programa_subsidio_otro') ? 'has-error' : ''}}>
    <label for="">Cual?</label>
    <input type="text" class="form-control" name="programa_subsidio_otro" value="{{old("programa_subsidio_otro")}}" id="programa_subsidio_otro">
    {!! $errors->first('programa_subsidio_otro', '<p class="help-block" style="color:red";>:message</p>') !!}
    </div><br>
  @else

  <div id="cualB12" style="display:none">
  <label for="">Cual?</label>
  <input type="text" class="form-control" name="programa_subsidio_otro" value="{{old("programa_subsidio_otro")}}" id="programa_subsidio_otro">
  </div><br>
  @endif

  <script type="text/javascript">
    var varios = document.querySelectorAll(".progra2")

    var otro = varios[varios.length-1]

    otro.onclick = function(){
       $('#programa_subsidio_otro').val('');
        $("#cualB12").toggle()



     }
  </script>


         <script>
            function selectOnChangeB12(sel) {
             if (sel.value=="1"){
                 divCB12 = document.getElementById("programa_subsidio_si");
                 divCB12.style.display = "";}


                 if (sel.value=="2"||sel.value=="3"){
                   divCB12 = document.getElementById("programa_subsidio_si");
                   divCB12.style.display = "none";
                   var checkboxes = divCB12.querySelectorAll('input');


                   checkboxes.forEach(function (oneCheckbox) {
                     oneCheckbox.checked = false;
                   })

                   document.querySelector('#cualB12').style.display = 'none';

                   document.querySelector('#programa_subsidio_otro').value = '';
             }}

         </script>
<!B13 Embarazo>


@if((old("genero")==2) || (old("genero")==3))
  <div class="form-group"style="display:none">
  @else
  <div class="form-group"id="embarazo" {{ $errors->has('embarazorelevamiento') ? 'has-error' : ''}}>
  @endif
  <label for="">B 13. Embarazo al inicio de la asistencia:</label>
  <select class="form-control" id="embarazorelevamiento_id" name="embarazorelevamiento">
          <option value="" selected=disabled>Seleccionar...</option>
          @if (old("embarazorelevamiento") == 1) <option value="1" selected>Si</option>
          @else <option value="1" >Si</option> @endif
          @if (old("embarazorelevamiento") == 2) <option value="2" selected>No</option>
          @else <option value="2" >No</option> @endif

          @if (old("embarazorelevamiento") == 3) <option value="2" selected>Se Desconoce</option>
          @else <option value="2" >Se Desconoce</option> @endif

  </select>
  {!! $errors->first('embarazorelevamiento', '<p class="help-block" style="color:red";>:message</p>') !!}
  </div>

  <script>
     function selectOnChangeB2(sel) {
      if (sel.value=="1" || sel.value=="4" || sel.value=="5"){
          divC = document.getElementById("embarazo");
          divC.style.display = "";}


          if (sel.value=="2"||sel.value=="3"){
            divC = document.getElementById("embarazo");
            divC.style.display = "none";
            var selection = divC.querySelectorAll('option');


            selection.forEach(function (option) {
              option.selected = false;
            })


      }


     }

  </script>



<!B14 Discapacidad>

<div class="form-group" {{ $errors->has('tiene_discapacidad') ? 'has-error' : ''}}>
<label for="">B 14. ¿Presenta algún tipo de discapacidad?</label><br>
<select class="form-control"  name="tiene_discapacidad" onChange="checkB14(this)">
        <option value="" selected=disabled>Seleccionar...</option>
        @if (old("tiene_discapacidad") == 1) <option value="1" selected>Si</option>
        @else <option value="1" >Si</option> @endif
        @if (old("tiene_discapacidad") == 2) <option value="2" selected>No</option>
        @else <option value="2" >No</option> @endif
          @if (old("tiene_discapacidad") == 3) <option value="3" selected>Se desconoce</option>
          @else <option value="3" >Se desconoce</option> @endif
</select>
{!! $errors->first('tiene_discapacidad', '<p class="help-block" style="color:red";>:message</p>') !!}
</div>

@if(old("tiene_discapacidad") == 1)
<div class="form-group"{{ $errors->has('discapacidades') ? 'has-error' : ''}}>
@else
<div class="form-group" style="display:none" id="b14Hidden">
@endif

    <label for="">B14 I Que tipo de discapacidad?
      En caso de requerir, tildar todas las opciones que considere correspondientes.</label><br>
        @foreach ($discapacidades as $discapacidad)
            <label class="form-check-inline form-check-label">
              @if(is_array(old("discapacidades")) && in_array($discapacidad->id, old("discapacidades")))
            <input type="checkbox" value="{{ $discapacidad->id }}" id="{{$discapacidad->nombre }}" class="form-check-inline discap" name="discapacidades[]" checked>
          @else
            <input type="checkbox" value="{{ $discapacidad->id }}" id="{{$discapacidad->nombre }}" class="form-check-inline discap" name="discapacidades[]">
          @endif
            {{ $discapacidad->nombre }}
            </label><br>
        @endforeach

    {!! $errors->first('discapacidades', '<p class="help-block" style="color:red";>:message</p>') !!}
    </div>


<script type="text/javascript">
        var discapacidades = document.querySelectorAll(".discap")
        var desconoce = discapacidades[discapacidades.length-1]


 desconoce.onclick = function(){
                 document.getElementById("físico-motriz").checked= false;
                 document.getElementById("físico-motriz").disabled = true;

                 document.getElementById("intelectual-adaptativo").checked= false;
                 document.getElementById("intelectual-adaptativo").disabled = true;

                 document.getElementById("psíquica").checked= false;
                 document.getElementById("psíquica").disabled = true;

                 document.getElementById("sensorial").checked= false;
                 document.getElementById("sensorial").disabled = true;

           }

</script>

    <script>
         function checkB14(checkbox)
         {
           var divC = document.querySelector("#b14Hidden");
           if (checkbox.value == 1) {
             divC.style.display = 'block';
           } else {
             divC.style.display = 'none';
             var checkboxes = divC.querySelectorAll('input');
             checkboxes.forEach(function (element) {
               element.checked = false;
             })
           }


         }
         function checkB14bis(checkbox){
         if (checkbox.checked)
             {   document.getElementById("Físico/Motriz").checked= false;
                 document.getElementById("Físico/Motriz").disabled = true;
                 document.getElementById("Intelectual/Adaptativo").checked= false;
                 document.getElementById("Intelectual/Adaptativo").disabled = true;
                 document.getElementById("Psíquica").checked= false;
                 document.getElementById("Psíquica").disabled = true;
                 document.getElementById("Sensorial").checked= false;
                 document.getElementById("Sensorial").disabled = true;
                 document.getElementById("No").checked= false;
                 document.getElementById("No").disabled = true;
             }
                 else{
                     document.getElementById('Físico/Motriz').disabled=false;
                     document.getElementById('Intelectual/Adaptativo').disabled=false;
                     document.getElementById('Psíquica').disabled=false;
                     document.getElementById('Sensorial').disabled=false;
                     document.getElementById('No').disabled=false;
                 }
         }
      </script>

<!B15 Lesiones físicas>

    <div class="form-group"{{ $errors->has('tienelesion') ? 'has-error' : ''}}>
    <label class="">B 15. ¿Presenta lesiones físicas visibles? </label>
    <select class="form-control" id="tienelesion" name="tienelesion" onChange="selectOnChangeB15(this)">
            <option value="" selected=disabled>Seleccionar...</option>
            @if(old("tienelesion") == 1)<option value="1" selected>Si</option>
            @else<option value="1" >Si</option>@endif
            @if(old("tienelesion") == 2)<option value="2" selected>No</option>
            @else<option value="2" >No</option>@endif
            @if(old("tienelesion") == 3)<option value="3" selected>Se desconoce</option>
            @else<option value="3" >Se desconoce</option>@endif
    </select>
    {!! $errors->first('tienelesion', '<p class="help-block" style="color:red";>:message</p>') !!}
    </div>

@if(old("tienelesion") == 1)
  <div class="" id="cualB15" {{ $errors->has('tipo_lesion') ? 'has-error' : ''}}>
  @else
    <div class="" id="cualB15" style="display: none">
    @endif

    <label class="">Tipo de lesión:</label>

    <input name="tipo_lesion" placeholder="" id="victima_lesion" class="form-control" type="text" value="{{old("tipo_lesion")}}">
    {!! $errors->first('tipo_lesion', '<p class="help-block" style="color:red";>:message</p>') !!}
    <br>
  </div>

      <script>
         function selectOnChangeB15(sel) {
                  if (sel.value=="1"){
                      divC = document.getElementById("cualB15");
                      divC.style.display = "";
                  }else{
                      divC = document.getElementById("cualB15");
                      $('#victima_lesion').val('');
                      divC.style.display="none";
                  }}

      </script>

<!B16 Enfermedades crónicas>

    <div class="form-group"{{ $errors->has('enfermedadcronica') ? 'has-error' : ''}}>
    <label class="">B 16. ¿Tiene enfermedades crónicas?</label>
    <select class="form-control" id="enfermedadcronica" name="enfermedadcronica" onChange="selectOnChange16(this)">
            <option value="" selected=disabled>Seleccionar...</option>
            @if(old("enfermedadcronica") == 1)<option value="1" selected>Si</option>
            @else<option value="1" >Si</option>@endif
            @if(old("enfermedadcronica") == 2)<option value="2" selected>No</option>
            @else<option value="2" >No</option>@endif
            @if(old("enfermedadcronica") == 3)<option value="3" selected>Se desconoce</option>
            @else<option value="3" >Se desconoce</option>@endif
    </select>
    {!! $errors->first('enfermedadcronica', '<p class="help-block" style="color:red";>:message</p>') !!}
    </div>

    @if(old("enfermedadcronica") == 1)
    <div class="" id="victima_tipo_enfermedad_cronica" {{ $errors->has('tipo_enfermedad_cronica') ? 'has-error' : ''}}>
    @else
    <div class="" id="victima_tipo_enfermedad_cronica" style="display: none">
      @endif

    <label class="">B 16I. Tipo de enfermedad crónica:</label>
    <input name="tipo_enfermedad_cronica" placeholder="Enfermedad crónica" id="victima_enfermedad_cronica" class="form-control" type="text" value="{{old("tipo_enfermedad_cronica")}}">
    {!! $errors->first('tipo_enfermedad_cronica', '<p class="help-block" style="color:red";>:message</p>') !!}
    <br>
    </div>


      <script>
         function selectOnChange16(sel) {
           if (sel.value=="1"){
                divC = document.getElementById("victima_tipo_enfermedad_cronica");
                divC.style.display = "";}

                 if (sel.value=="2"){
                      divC = document.getElementById("victima_tipo_enfermedad_cronica");
                      $('#victima_enfermedad_cronica').val('');
                      divC.style.display = "none";}
                      if (sel.value=="3"){
                           divC = document.getElementById("victima_tipo_enfermedad_cronica");
                           $('#victima_enfermedad_cronica').val('');
                           divC.style.display = "none";}


         }
      </script>




<!B17 Limitaciones>

<div class="form-group"{{ $errors->has('tiene_limitacion') ? 'has-error' : ''}}>
<label>B 17. ¿Presenta algún tipo de limitación para comunicarse? </label><br>
<select class="form-control" name="tiene_limitacion" OnChange="selectOnChangeB17(this)">
        <option value="" selected=disabled>Seleccionar...</option>
        @if(old("tiene_limitacion") == 1)<option value="1" selected>Si</option>
        @else<option value="1" >Si</option>@endif
        @if(old("tiene_limitacion") == 2)<option value="2" selected>No</option>
        @else<option value="2" >No</option>@endif
        @if(old("tiene_limitacion") == 3)<option value="3" selected>Se desconoce</option>
        @else<option value="3" >Se desconoce</option>@endif
</select>
{!! $errors->first('tiene_limitacion', '<p class="help-block" style="color:red";>:message</p>') !!}
</div>

@if(old("tiene_limitacion") == 1)
  <div class="form-group" id="limitacionesSi" {{ $errors->has('limitaciones') ? 'has-error' : ''}}>
    <label>En caso de requerir, tildar todas las opciones que considere correspondientes.</label><br>
    <div>
      @foreach ($limitaciones as $limitacion)
          <label class="form-check-inline form-check-label">
          @if(is_array(old("limitaciones")) && in_array($limitacion->id, old("limitaciones")))
              <input type="checkbox" value="{{ $limitacion->id }}" class="form-check-inline limi2" name="limitaciones[]" checked>
          @else
              <input type="checkbox" value="{{ $limitacion->id }}" class="form-check-inline limi2" name="limitaciones[]">
          @endif
              {{ $limitacion->nombre }}
              </label><br>
      @endforeach
    {!! $errors->first('limitaciones', '<p class="help-block" style="color:red";>:message</p>') !!}
    </div>
@else
<div class="form-group" id="limitacionesSi" style="display:none">
    <label>En caso de requerir, tildar todas las opciones que considere correspondientes.</label><br>
    <div>
      @foreach ($limitaciones as $limitacion)
          <label class="form-check-inline form-check-label">
          @if(is_array(old("limitaciones")) && in_array($limitacion->id, old("limitaciones")))
              <input type="checkbox" value="{{ $limitacion->id }}" class="form-check-inline limi2" name="limitaciones[]" checked>
          @else
              <input type="checkbox" value="{{ $limitacion->id }}" class="form-check-inline limi2" name="limitaciones[]">
          @endif
              {{ $limitacion->nombre }}
              </label><br>
      @endforeach
    </div>
@endif



    @if(is_array(old("limitaciones")) && in_array("4", old("limitaciones")))
      <div id="cualB17" {{ $errors->has('limitacion_otro') ? 'has-error' : ''}}>
      @else
        <div id="cualB17" style="display:none">
      @endif
      <label for="">Cual?</label>
      <input type="text" class="form-control" name="limitacion_otro"  id="victima_limitacion_otra" value="{{old("limitacion_otro")}}">
      {!! $errors->first('limitacion_otro', '<p class="help-block" style="color:red";>:message</p>') !!}
      </div>
      <br><br>
    </div>
       <script type="text/javascript">
        var limita = document.querySelectorAll(".limi2")
        var otro = limita[limita.length-1]

        otro.onclick = function(){
               $('#victima_limitacion_otra').val('');
            $("#cualB17").toggle()
         }
         </script>

      <script>
         function selectOnChangeB17(sel) {
          if (sel.value=="1"){
              divC = document.getElementById("limitacionesSi");
              divC.style.display = "";}


              if (sel.value=="2"||sel.value=="3"){
                divCB17 = document.getElementById("limitacionesSi");
                divCB17.style.display = "none";
                var checkboxes = divCB17.querySelectorAll('input');


                checkboxes.forEach(function (oneCheckbox) {
                  oneCheckbox.checked = false;
                })

                document.querySelector('#cualB17').style.display = 'none';

                document.querySelector('#victima_limitacion_otra').value = '';
          }


         }

      </script>


<!-B18 Persona asistida es la víctima?->

  <div class="form-group"{{ $errors->has('persona_asistida') ? 'has-error' : ''}}>
  <label for="persona_asistida">B 18. ¿Es la persona asistida la víctima directa?:</label>
  <select class="form-control" name="persona_asistida">
      <option value="" selected=disabled>Seleccionar...</option>
          @if(old("persona_asistida") == 1)<option value="1"selected>Sí</option>
          @else<option value="1">Sí</option>@endif

          @if(old("persona_asistida") == 2)<option value="2"selected>No</option>
          @else<option value="2">No</option>@endif
  </select>
  {!! $errors->first('persona_asistida', '<p class="help-block" style="color:red";>:message</p>') !!}
  </div>

  <!-B19 Mas Personas asistidas relacionadas a la víctima?->

    <div class="form-group"{{ $errors->has('otras_personas_asistidas') ? 'has-error' : ''}}>
    <label>B 19. ¿Se asisten a mas personas relacionadas a la víctima?:</label>
    <select class="form-control" name="otras_personas_asistidas">
        <option value="" selected=disabled>Seleccionar...</option>
            @if(old("otras_personas_asistidas") == 1)<option value="1"selected>Sí</option>
            @else<option value="1">Sí</option>@endif

            @if(old("otras_personas_asistidas") == 2)<option value="2"selected>No</option>
            @else<option value="2">No</option>@endif
    </select>
    {!! $errors->first('otras_personas_asistidas', '<p class="help-block" style="color:red";>:message</p>') !!}
    </div>


<!BOTONES>

    <div class="botones">
    <div class="btn-1"> <button type="submit" class="btn btn-primary col-xl" name="button"  >Agregar/Enviar</button><br><br></div>
    </div>
    </form>
    </section>

    </body>
 </html>
