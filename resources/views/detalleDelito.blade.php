<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
      <link rel="stylesheet" href="css/app.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <title>Eje D: Caracterización de delito</title>
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
     
   </header>

<body>

    <h1 class="text-center" style="padding: 15px;">Eje D: Datos del delito</h1>
    <section class="container jumbotron shadow p-3 mb-5 bg-white rounded">
    <form class="" action="/detalleDelito" method="post">
    {{ csrf_field() }}
      <input type="hidden" name="idCaso" value="{{session("idCaso")}}">
    <input type="hidden" name="idDelito" value="{{session("idDelito")}}">
    <input type="hidden" name="userID_create" value="{{$hecho->userID_create}}">

<!-D1 Caratulación judicial->

    <div class="form-group" {{ $errors->has('caratulacion_judicial') ? 'has-error' : ''}}>
    <label for="caratulacion_judicial">D 1. Caratulación judicial:</label>
    <input type="text" class="form-control" name="caratulacion_judicial" id="caratulacion_judicial" value="{{$caratulacion_judicial}}">
    {!! $errors->first('caratulacion_judicial', '<p class="help-block" style="color:red";>:message</p>') !!}
    </div>

<!-D2 Fecha del hecho->

    <div class="form-group" {{ $errors->has('fecha_hecho') ? 'has-error' : ''}}>
    <label for="">D 2. Fecha del hecho: </label>
    <input type="date" class="form-control" id="fecha_hecho" name="fecha_hecho" value="{{$fecha_hecho}}"><br>
    <label for="bloqueo3" class="form-check-label">Se desconoce</label>
    <input type="checkbox" id="bloqueo2" name="fecha_hecho" value="Se desconoce" onchange="checkD2(this)">
    {!! $errors->first('fecha_hecho', '<p class="help-block" style="color:red";>:message</p>') !!}
    </div>
      <script>
               function checkD2(checkbox)
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

<!-D3 País del hecho->

    <div class="form-group" {{ $errors->has('pais_hecho') ? 'has-error' : ''}}>
    <label for="countryId2">D 3. País del hecho:</label>
    <select name="pais_hecho" class="countries2 order-alpha form-control" id="countryId2">
      <option value="" selected=disabled>Seleccionar...</option>
      @if($pais_hecho==1)
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
    <label for="stateId2">D 4. Provincia del hecho:</label>
    <select name="provincia_hecho" class="states2 order-alpha form-control" id="stateId2">
    <option value="" selected=disabled>Seleccionar...</option>
    <option value="0">Se desconoce</option>
    @foreach ($provincias as $provincia)
      @if ($provincia_hecho==$provincia->id)
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
    <label for="cityId2">D 5. Localidad del hecho:</label>
    <select name="localidad_hecho" class="cities2 order-alpha form-control" id="cityId2">
    <option value="" selected=disabled>Seleccionar...</option>
    <option value="0">Se desconoce</option>  

    @foreach ($ciudades as $ciudad)

          @if($localidad_hecho==$ciudad->id)
     
      <option class="" value="{{$ciudad->id}}">{{$ciudad->localidad_nombre}}</option> 
   @endif

    @endforeach

    @foreach ($ciudades as $ciudad)
      @if ((old("provincia_hecho")==$ciudad->idPcia))
      <option class="opcionProvincia provincia{{$ciudad->idPcia}}" style="display:none" value="{{$ciudad->id}}" selected>{{$ciudad->nombre}}</option>
      @else
      <option class="opcionProvincia provincia{{$ciudad->idPcia}}" style="display:none" value="{{$ciudad->id}}">{{$ciudad->localidad_nombre}}</option>
      @endif
    @endforeach
    </select>
    <label>Se desconoce</label>
    <input type="checkbox" name="localidad_hecho" id="desconoceCiudadExplotacion" value="Se desconoce"  onchange="checkD5(this)"><br>
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
                           $('#stateId2').val('');
                           document.getElementById('cityId2').removeAttribute("readonly");
                       }
           }
        </script>


<!-BOTONES->


    <button type="submit" class="btn btn-primary col-xl" name="button">Enviar</button>
  </form>
  </section>

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
