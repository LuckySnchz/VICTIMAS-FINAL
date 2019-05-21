


//en el Home, trae todos los casos en los que los cree y los que intervine

@if(Auth::user()->hasRole('profesional'))

@for($i=0; $i<$longitud; $i++)

<br><br>

{{$casosprof[$i]}}

@endfor

@endif


switch ($req["buscar"]) {
                case "4":

$casos = Caso::where('activo' ,'=',1)

    ->where(function($query) use ($search){
        $query->where('nombre_referencia', 'LIKE', '%'.$search.'%');
        $query->orWhere('nombre_y_apellido_de_la_victima', 'LIKE', '%'.$search.'%');
        $query->orWhere('modalidad_ingreso', 'LIKE', '%'.$search.'%');
     

    })

    $demandas = Demanda::where('activo' ,'=',1)

    ->where(function($query) use ($search){
        $query->where('nombre_y_apellido_de_la_victima', 'LIKE', '%'.$search.'%');
      
        $query->orWhere('modalidad_ingreso', 'LIKE', '%'.$search.'%');
     

    })->get(); 
   


$derivaciones = Derivacion::where('activo' ,'=',1)

    ->where(function($query) use ($search){
        $query->where('nombre_y_apellido', 'LIKE', '%'.$search.'%');
      
        $query->orWhere('modalidad_ingreso', 'LIKE', '%'.$search.'%');
     

    })

   
    ->get();        

        
        }
            


