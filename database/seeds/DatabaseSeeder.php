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
        // $this->call(UsersTableSeeder::class);
        DB::table("users")->insert(

        ['email'=>"xul27@hotmail.com",
        'sede'=>"LA PLATA",
        'area'=>"DIRECTORA",
        'nombre'=>"Lucky",
        'apellido'=>"sanchez", 
         'email_verified_at'=>"xul27@hotmail.com",            
        'password'=>"123456",]

       
    );
    }
}
