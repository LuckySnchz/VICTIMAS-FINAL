<!--Pcia Se Desconoce-->
<div class="form-group" {{ $errors->has('localidad_hecho_pcia_sedesconoce') ? 'has-error' : ''}}>
    <label for="cityId2">D 5. Localidad del hecho:</label>
    <select name="localidad_hecho_pcia_sedesconoce" class=" order-alpha form-control" id="localidad_hecho_pcia_sedesconoce">
    <option value="" selected=disabled>Seleccionar...</option>
    @foreach ($ciudades as $ciudad)
    
     @if ((old("localidad_hecho_pcia_sedesconoce")==$ciudad->id))
      <option value="{{$ciudad->id}}" selected>{{$ciudad->localiadad_nombre}}</option>
      @else
      <option value="{{$ciudad->id}}">{{$ciudad->localiadad_nombre}}</option></option>
      @endif
    @endforeach
    </select>
    <label>Se desconoce</label>
    <input type="checkbox" value="4066" onchange="checkD5bis(this)" name="localidad_hecho_pcia_sedesconoce"><br>
    {!! $errors->first('localidad_hecho_pcia_sedesconoce', '<p class="help-block" style="color:red";>:message</p>') !!}
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