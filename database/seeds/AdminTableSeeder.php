<?php
use Illuminate\Database\Seeder;
class AdminTableSeeder extends Seeder{
    public function run(){
        \DB::table('users')->insert(array(
            'nombre' => 'Johan',
            'apellido' => 'Villamil',
            'email' => 'johandbz@hotmail.com',
            'password' => \Hash::make('secret'),
            'tipo' => 'admin'
        ));
    }
} 