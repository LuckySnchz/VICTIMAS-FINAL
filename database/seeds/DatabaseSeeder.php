<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
          DB::table("users")->truncate();
         DB::table("users")->insert(

        ['email'=>"calder07@gmail.com",
        'sede'=>"LA PLATA",
        'area'=>"DIRECTORA",
        'nombre'=>"Lucky",
        'apellido'=>"sanchez",                
        'password'=>'$2y$10$o/DdQokVeaIN2SIHWSe5Le7lUt5Ht8qfrgfmtSE.Av.ldsUfZ0kSy',]

       
    );
      
    }
}
