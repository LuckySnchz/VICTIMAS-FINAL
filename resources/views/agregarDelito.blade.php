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
      <title>Eje D: Caracterización de delito</title>
      <style>
      </style>
      <script type="text/javascript">
          window.history.forward();
          function sinVueltaAtras(){ window.history.forward(); }
      </script>
   </head>
   <header>
     @include('navbar')
<br>
  <ul class="nav nav-pills">
  @if($institucionnav==0)

    @foreach($vistas as $vista)
         @if($vista->url=="agregarCaso")
  <li class="nav-item">
    <a style="color:black" class="nav-link disabled" href="#">{{$vista->nombre}}</a>
  </li>

  @elseif($vista->url=="agregarDelito")
  <li class="nav-item">
    <a class="nav-link active" href="#">{{$vista->nombre}}</a>
  </li>

    @else
    <li class="nav-item">
    <a class="nav-link" href="{{$vista->url}}">{{$vista->nombre}}</a>
  </li>

    @endif
    @endforeach

@else

<br><br>
     @foreach($vistas as $vista)
         @if($vista->url=="agregarCaso")
  <li class="nav-item">
    <a style="color:black" class="nav-link disabled" href="#">{{$vista->nombre}}</a>
  </li>

    @elseif($vista->url=="agregarOrganismo")
  <li class="nav-item">
    <a style="color:black" class="nav-link disabled" href="#">{{$vista->nombre}}</a>
  </li>

        @elseif($vista->url=="agregarDelito")
  <li class="nav-item">
    <a class="nav-link active" href="#">{{$vista->nombre}}</a>
  </li>

        @else
  <li class="nav-item">
    <a class="nav-link" href="{{$vista->url}}">{{$vista->nombre}}</a>
  </li>
@endif
@endforeach
@endif

 </ul>
   </header>

<body onload="sinVueltaAtras();" onpageshow="if (event.persisted) sinVueltaAtras();" onunload="">


    <h1 class="text-center" style="padding: 15px;">Eje D: Datos del delito</h1>
    <section class="container jumbotron shadow p-3 mb-5 bg-white rounded">
    <form class="" action="/agregarDelito" method="post">
    {{ csrf_field() }}
    <input type="hidden" name="idCaso" value="{{session("idCaso")}}">

<!-D1 Tipo de fecha->

    <div class="form-group" {{ $errors->has('fecha_delito') ? 'has-error' : ''}}>
    <label>D 1. Tipo de fecha del hecho:</label>
     <select class="form-control" id="fecha_delito" name="fecha_delito" onChange="selectOnChangeD1(this)">

          <option value="" selected=disabled>Seleccionar...</option>
          @if(old("fecha_delito") == 1) <option value="1" selected>Fecha específica</option>
          @else <option value="1" >Fecha específica</option>@endif

          @if(old("fecha_delito") == 2) <option value="2" selected>Otro</option>
          @else <option value="2" >Otro</option>@endif

          @if(old("fecha_delito") == 3) <option value="3" selected>Se desconoce</option>
          @else <option value="3" >Se desconoce</option>@endif
    </select>
    {!! $errors->first('fecha_delito', '<p class="help-block" style="color:red";>:message</p>') !!}
    </div>




<!-D2 Fecha del hecho->
 @if(old("fecha_delito") == 1)
  <div class="form-group" id="fecha_si"{{ $errors->has('fecha_hecho_si') ? 'has-error' : ''}}>
  @else
    <div class="form-group" id="fecha_si" style="display:none">
  @endif

<div class="form-group"{{ $errors->has('fecha_hecho') ? 'has-error' : ''}}>
     <label for="">D 1 I. Fecha del hecho: </label>
    <input type="date" class="form-control" id="fecha_hecho" name="fecha_hecho" value="{{old('fecha_hecho')}}">
    <label for="bloqueo3" class="form-check-label">Se desconoce</label>
    <input type="checkbox" id="bloqueo3" name="fecha_hecho_desconoce" value="Se desconoce" onchange="checkB3(this)">
    {!! $errors->first('fecha_hecho', '<p class="help-block" style="color:red";>:message</p>') !!}
    </div>
  </div>

      <script>
         function checkB3(checkbox)
         {
             if (checkbox.checked)
             {
                 $('#fecha_hecho').val('1900-01-01');
                 document.getElementById('fecha_hecho').setAttribute("readonly", "readonly");
             }else
                 {
                     $('#fecha_hecho').val('');
                     document.getElementById('fecha_hecho').removeAttribute("readonly");
                 }
         }
      </script>
  <script>
          function selectOnChangeD1(sel) {
                   if (sel.value=="1"){
                       divCD1 = document.getElementById("fecha_si");
                       divCD1.style.display = "";
                         $('#fecha_hecho_otro').val('');
                   }else{
                       divCD1 = document.getElementById("fecha_si");
                       divCD1.style.display="none";
                   }
               if (sel.value=="2"){
                       divCD2 = document.getElementById("fecha_delito_otro");
                       divCD2.style.display = "";

                     $('#fecha_hecho').val('');
                     document.getElementById('fecha_hecho').removeAttribute("readonly");
                            divCDD = document.getElementById("bloqueo3").checked=false;
                   }else{
                       divCD2 = document.getElementById("fecha_delito_otro");

                       divCD2.style.display="none";
                   }



                 }
        </script>


  @if(old("fecha_delito") == 2)
  <div class="form-group" id="fecha_delito_otro" {{ $errors->has('fecha_hecho_otro') ? 'has-error' : ''}}>
  @else
    <div class="form-group" id="fecha_delito_otro"  style="display:none">
  @endif
    <label for="">D 1 I. Descripción de periodo de fechas del hecho: </label>
    <input type="text" style="height: 100px" class="form-control" id="fecha_hecho_otro" name="fecha_hecho_otro" value="{{old("fecha_hecho_otro")}}"><br>
    {!! $errors->first('fecha_hecho_otro', '<p class="help-block" style="color:red";>:message</p>') !!}
    </div>



<!-D3 País del hecho->

    <div class="form-group" {{ $errors->has('pais_hecho') ? 'has-error' : ''}}>
    <label for="countryId2">D 2. País del hecho:</label>
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

<!-D4 Provincia del hecho->

    <div class="form-group" {{ $errors->has('provincia_hecho') ? 'has-error' : ''}}>
    <label for="stateId2">D 3. Provincia del hecho:</label>
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

<!-D5 Localidad del hecho->

    <div class="form-group" {{ $errors->has('localidad_hecho') ? 'has-error' : ''}}>
    <label for="cityId2">D 4. Localidad del hecho:</label>
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

<!-BOTONES->

    <button type="submit" class="btn btn-primary col-xl" name="button">Enviar</button>
  </form>
  </section>

  <!-- <script src="/js/paises.js" type="text/javascript"></script> -->

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




</body>
</html>
