
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
      <title>Incidencia</title>
      <style>
         .Auno,.Ados{float: left;
         width: 40%
         }
         .AunoDos{overflow: hidden;margin-left: 1%}
      </style>
   </head>
   <header>

    @include('navbar')
<div class="panel"style="background-color:rgb(137, 210, 14);text-align: center;margin-bottom: 0.1%">
                <a class="navbar-brand"  href="/home">
                    <h3 style="color:white">INICIO</h3>
                </a>
                </div>
   </header>
   <body>
      <h1 class="text-center" style="padding: 15px;">Incidencia</h1>

      <section class="container jumbotron shadow p-3 mb-5 bg-white rounded">

        @if ($errors->any())
          <div class="alert alert-danger">
          <p>Debes completar todo el <strong>formulario A</strong> para continuar</p>
          </div>
        @endif

         <form class="" action="/agregardemanda" method="post">
                {{csrf_field()}}


<!-1 Fecha de ingreso->

<div class="form-group"
{{ $errors->has('fecha_ingreso') ? 'has-error' : ''}}>
<label for="datos_fecha_ingreso">1. Fecha de Ingreso:</label>
<input type="date" class="form-control" name="fecha_ingreso" id="datos_fecha_ingreso" value="{{old('fecha_ingreso')}}">
{!! $errors->first('fecha_ingreso', '<p class="help-block" style="color:red";>:message</p>') !!}
</div>

<!-2 Nombre y apellido de la victima->

  <div class="form-group "{{ $errors->has('nombre_y_apellido_de_la_victima') ? 'has-error' : ''}}>
  <label for="">2. Nombre y apellido de la víctima:</label>
  <input type="text" class="form-control" name="nombre_y_apellido_de_la_victima" id="victima_nombre_y_apellido" value="{{old('nombre_y_apellido_de_la_victima')}}">
  {!! $errors->first('nombre_y_apellido_de_la_victima', '<p class="help-block" style="color:red";>:message</p>') !!}
  </div>

<!-3 Tipo de delito->

           <div class="form-group " id="tipodoc" {{ $errors->has('delito') ? 'has-error' : ''}}>
    <label for="">3. Tipo de delito:</label>
<select class="form-control" name="delito" onChange="selectOnChangeA2(this)">
              <option value="" selected=disabled>Seleccionar...</option>
              @foreach ($delitos as $delito)
                @if(old("delito")==$delito->id)
                <option selected value="{{ $delito->id }}">{{ $delito->nombre}}</option>
              @else <option  value="{{ $delito->id }}">{{ $delito->nombre}}</option>
              @endif
            @endforeach
            </select>
    {!! $errors->first('delito', '<p class="help-block" style="color:red";>:message</p>') !!}


    @if (old("delito") == 73) <div id="cualA2" {{ $errors->has('otro_delito') ? 'has-error' : ''}}>
    @else
    <div id="cualA2" style="display: none">
    @endif
    <label for="">Cuál?</label>
    <input name="otro_delito"  id="otro_delito" class="form-control" type="text" value="{{old("otro_delito")}}">
    {!! $errors->first('otro_delito', '<p class="help-block" style="color:red";>:message</p>') !!}
    </div>
    </div>

</div>

        <script>
           function selectOnChangeA2(sel) {
            if (sel.value=="73"){
              divC = document.getElementById("cualA2");
              divC.style.display = "";
            }else{
              divC = document.getElementById("cualA2");
              $('#otro_delito').val('');
              divC.style.display="none";
            }
           }

        </script>




  <!-4 País del hecho->

<div class="form-group" {{ $errors->has('pais_hecho') ? 'has-error' : ''}}>
<label for="countryId2">4. País del hecho:</label>
<select name="pais_hecho" class="countries2 order-alpha form-control" id="countryId2">
  <option value="" selected=disabled>Seleccionar...</option>
  @if((old("pais_hecho")==1))
  <option value="1" selected>Argentina</option>
  @else
  <option value="1">Argentina</option>
  @endif
</select>
<br>
{!! $errors->first('pais_hecho', '<p class="help-block" style="color:red";>:message</p>') !!}
</div>

  <!-5 Provincia del hecho->

  <div class="form-group" {{ $errors->has('provincia_hecho') ? 'has-error' : ''}}>
  <label for="stateId2">5. Provincia del hecho:</label>
  <select name="provincia_hecho" class="states2 order-alpha form-control" id="stateId2">
  <option value="" selected=disabled>Seleccionar...</option>
    <option value="0">Se desconoce</option>
  @foreach ($provincias as $provincia)
    @if ((old("provincia_hecho")==$provincia->id))
    <option value="{{$provincia->id}}" selected>{{$provincia->nombre}}</option>
    @else
    <option value="{{$provincia->id}}">{{$provincia->nombre}}</option>
    @endif
  @endforeach
  </select>
  <label>Se desconoce</label>
  <input type="checkbox" name="provincia_hecho" id="desconoceProvinciaExplotacion" value="Se desconoce" onchange="checkD4(this)"><br>
  {!! $errors->first('provincia_hecho', '<p class="help-block" style="color:red";>:message</p>') !!}
  </div>

  <script>
             function checkD4(checkbox)
             {
                 if (checkbox.checked)
                     {
                         $('#stateId2').val('0');
                         document.getElementById('stateId2').setAttribute("readonly", "readonly");

                     }else
                         {
                             $('#stateId2').val('');
                             document.getElementById('stateId2').removeAttribute("readonly");
                         }
             }
          </script>

  <!-6 Localidad del hecho->

<div class="form-group" {{ $errors->has('localidad_hecho') ? 'has-error' : ''}}>
<label for="cityId2">6. Localidad del hecho:</label>
<select name="localidad_hecho" class="cities2 order-alpha form-control" id="cityId2">
<option value=" " selected=disabled>Seleccionar...</option>
  <option value="0">Se desconoce</option>
@foreach ($ciudades as $ciudad)
  @if ((old("provincia_hecho")==$ciudad->id))
  <option class="opcionProvincia provincia{{$ciudad->idPcia}}" style="display:none" value="{{$ciudad->id}}" selected>{{$ciudad->nombre}}</option>
  @else
  <option class="opcionProvincia provincia{{$ciudad->idPcia}}" style="display:none" value="{{$ciudad->id}}">{{$ciudad->localidad_nombre}}</option>
  @endif
@endforeach
</select>
<label>Se desconoce</label>
<input type="checkbox" name="localidad_hecho" id="desconoceCiudadExplotacion" value="Se desconoce" onchange="checkD5(this)"><br>
{!! $errors->first('localidad_hecho', '<p class="help-block" style="color:red";>:message</p>') !!}
</div>
<script>
       function checkD5(checkbox)
       {
           if (checkbox.checked)
               {
                   $('#cityId2').val('0');
                   document.getElementById('cityId2').setAttribute("readonly", "readonly");

               }else
                   {
                       $('#cityId2').val('');
                       document.getElementById('cityId2').removeAttribute("readonly");
                   }
       }
    </script>

    <script type="text/javascript">
      document.querySelector("#stateId2").onchange = function() {
        var value = this.options[this.selectedIndex].value;

        var opciones = document.querySelectorAll(".opcionProvincia");

        for (var i = 0; i < opciones.length; i++) {
          opciones[i].style.display = "none";
        }

        var opciones = document.querySelectorAll(".provincia" + value);

        for (var i = 0; i < opciones.length; i++) {
          opciones[i].style.display = "block";
        }
      }
    </script>

<!-7 Modalidad de ingreso->

  <div class="form-group"
  {{ $errors->has('modalidad_ingreso') ? 'has-error' : ''}}>
  <label for="modalidad_ingreso">7. Modalidad de Ingreso</label>
  <select class="form-control" name="modalidad_ingreso" id="modalidad_id" onChange="selectOnChangeA5A(this)">
            <option value="" selected=disabled>Seleccionar...</option>
            @if (old("modalidad_ingreso")==1)
              <option value="1" selected>Presentación espontánea</option>
            @else <option value="1" >Presentación espontánea</option>
            @endif

            @if (old("modalidad_ingreso")==2)
              <option value="2" selected>Intervención de oficio</option>
            @else <option value="2" >Intervención de oficio</option>
            @endif

            @if (old("modalidad_ingreso")==3)
              <option value="3" selected>Derivación de otro organismo</option>
            @else <option value="3" >Derivación de otro organismo</option>
            @endif
  </select><br>
  {!! $errors->first('modalidad_ingreso', '<p class="help-block" style="color:red";>:message</p>') !!}

  @if(old("modalidad_ingreso") == 3) <div id="derivacion_otro_organismo_id" {{ $errors->has('organismo') ? 'has-error' : ''}}>


  @else<div class="form-group" id="derivacion_otro_organismo_id" style="display:none">
  @endif


<label>7.I Qué organismo derivó?</label>
<select class="form-control" name="organismo" id="organismo" onChange="selectOnChangeA5(this)">
        <option value="0" selected=disabled>Seleccionar...</option>
        @foreach ($organismos as $organismo)
          @if(old("organismo")==$organismo->id)
          <option selected value="{{ $organismo->id }}">{{ $organismo->nombre}}</option>
        @else <option  value="{{ $organismo->id }}">{{ $organismo->nombre}}</option>
        @endif
      @endforeach
      </select>
{!! $errors->first('organismo', '<p class="help-block" style="color:red";>:message</p>') !!}


@if (old("organismo") == 24) <div id="cualA5" {{ $errors->has('otro_organismo') ? 'has-error' : ''}}>
@else
<div id="cualA5" style="display: none">
@endif
<label for="">Cuál?</label>
<input name="otro_organismo"  id="otro_organismo" class="form-control" type="text" value="{{old("otro_organismo")}}">
{!! $errors->first('otro_organismo', '<p class="help-block" style="color:red";>:message</p>') !!}
</div>
</div>

</div>
<script>
   function selectOnChangeA5A(sel) {
    if (sel.value=="3"){
        divC = document.getElementById("derivacion_otro_organismo_id");
        divC.style.display = "";}


        if (sel.value=="1"||sel.value=="2"||sel.value=="0"){
          divC = document.getElementById("derivacion_otro_organismo_id");
          divC.style.display = "none";

          document.querySelector('#cualA5').style.display = 'none';
          $('#otro_organismo').val('');
           $('#organismo').val('0');
    }
   }
</script>

  <script>
     function selectOnChangeA5(sel) {


      if (sel.value=="24"){
        divC = document.getElementById("cualA5");
        divC.style.display = "";
      }else{
        divC = document.getElementById("cualA5");
        $('#otro_organismo').val('');
        divC.style.display="none";
      }
     }

  </script>




  </section>

<!-BOTONES->
  <button type="submit" style="color:white;background-color:rgb(137, 210, 14)" class="btn col-xl" name="button">GUARDAR</button><br><br>
  </form>
  </body>
</html>
