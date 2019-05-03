    <!-- <ul>
        @foreach($personas as $persona)


      @if($persona->idCaso==session("idCaso")&&$persona->idVictim==session("idVictim"))
               <li>

              <strong style="margin-left:-15%">{{$persona->nombre_persona_asistida}}</strong>

<div class="botones" style="overflow:hidden;margin-left:15%">
        <div class="btn1" style="float:left">  <input type ='button' style="width:150px;background-color:#97c93f;color:black;border: solid black 1px" class="btn btn-danger col-xs" name="button" value = 'Editar' onclick="window.open('/detallePersona/{{$persona->id}}', 'width=800,height=600');"/></button></div>
        
        <div class="btn2" style="float:left">   <input type ='button' style="width:150px; margin-left:13%;color:black;border: solid black 1px" class="btn btn-danger col-xs" name="button" value = 'Eliminar' onclick="window.open('/eliminar/{{$persona->id}}', 'width=800,height=600');"/></button></div>
        </div>
            </li>



      @endif
        @endforeach

      </ul>-->
      <ul style="list-style:none">
  @foreach($personas_nuevas as $persona_nueva)
  @if($persona_nueva->idVictim==session("idVictim"))

  <li>
          @foreach($personas as $persona)
          @if($persona->id==$persona_nueva->idPersona)
                  {{$persona->nombre_persona_asistida}}
                  @endif
                  @endforeach
                  <strong>  <a style="color:red"href="/eliminar/{{$persona->id}}">
              ELIMINAR</a></strong>

          </li>
                @endif

            @endforeach
  </ul>