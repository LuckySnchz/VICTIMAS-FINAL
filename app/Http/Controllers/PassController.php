<?php
// Hola lucky, aca en el controlador vas a encontrar lineas comentadas, esas lineas mostraban el resultado en un view de trata,
// te lo dejé armado con dd, modificalo a gusto.

// en routes, se encuentra la ruta, esto tendrá que ir en http->controllers->Auth, pero te lo deje en los la carpeta 
// controller que veo que es la que mas usas.

// para utilizar esta funcion tenes que ingresar por url agregando el email completo de la persona:
//  http: //localhost:8000/cambiarPassword/ignacioklena@hotmail.com

//  espero te sirva de ayuda.


namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\User;
use Closure;



class PassController extends Controller
{

    //Método con str_shuffle() 


public function index() { 
        $users=User::all();
        
        foreach ($users as $user) {
          
     $password=$user->NewPass;
        $hayUsuario=User::where("email",$user->email)->first();
         $passwordBase=Hash::make($password);
        $hayUsuario->password=$passwordBase;
            $hayUsuario->save();
       

           
        }
      
       
}
}

	