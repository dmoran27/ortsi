<?php

use Illuminate\Database\Seeder;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class,10)->create();
        $items = [
            
            [ 'nombre'=> 'Diana',
                    'apellido'=> 'Moran',
                    'cedula'=> '27368169',
                    'telefono'=> '123456',
                    'sexo'=> 'Femenino',
                    'area_id'=> 1,                     
                    'email'=>'dianacmoran27@gmail.com',
                    'password'=>bcrypt('123123'),
                    'remember_token' => str_random(10),
                ],

        ];

        foreach ($items as $item) {
            \App\User::create($item);
        }
    }
}
