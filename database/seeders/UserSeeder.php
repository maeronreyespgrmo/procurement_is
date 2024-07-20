<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        //_jdE23iK
        $users = array(
            array(
                'username' => 'administrator_',
                'password' => bcrypt('_jdE23iK'),
                'type'     => 1
            ),
            array(
                'username' => 'opa_user',
                'password' => bcrypt('4dm1n_PMC'),
                'type'     => 0
            ),
            array(
                'username' => 'opa_user2',
                'password' => bcrypt('4dm1n_PMC'),
                'type'     => 0
            )
        );
        DB::table('users')->insert($users);
    }
}
