<?php

use Illuminate\Database\Seeder;
use use Illuminate\Support\Facades\DB;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          DB::table("users")->insert(

        ['email'=>"calder07@gmail.com",
        'sede'=>"LA PLATA",
        'area'=>"DIRECTORA",
        'nombre'=>"Lucky",
        'apellido'=>"sanchez",                
        'password'=>"0123456789XYZ",]

       
    );
    }
}
