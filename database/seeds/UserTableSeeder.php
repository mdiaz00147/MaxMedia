<?php
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UserTableSeeder extends Seeder{
    public function run(){
        $faker = Faker::create();
        for ($i=0;$i<=30;$i++){
            $id = \DB::table('users')->insertGetId(array(
                'nombre' => $faker->firstName,
                'apellido' =>  $faker->lastName,
                'email' => $faker->unique()->email,
                'password' => \Hash::make('123456'),
                'telefono' => $faker->phoneNumber,
                'paypal_email' => $faker->email,
                'paypal_name' => $faker->company,
                'direccion_envio' => $faker->address,
                'pais' => $faker->country,
                'tipo' => 'user',

            ));
        }
    }
} 