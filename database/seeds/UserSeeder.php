<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name='clara';
        $user->email='prova@prova.it';
        $user->password=bcrypt('ciaociao');
        $user->save();

    }
}
