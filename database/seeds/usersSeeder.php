<?php

use Illuminate\Database\Seeder;

class usersSeeder extends Seeder
{
    public function run()
    {
        
        DB::table('users')->insert([
            'departement_id' => 1,
        	'username' => '161420133',
        	'password' => bcrypt('smkn4plg'),
        	'name' => 'M Zikri Febrianza',
            'nip' => '161420133',
        	'level' => 'admin',
        	'created_at' => date('Y-m-d h:m:s'),
        	'updated_at' => date('Y-m-d h:m:s')
        ]);

        DB::table('users')->insert([
            'departement_id' => 2,
        	'username' => '161420134',
        	'password' => bcrypt('smkn4plg'),
        	'name' => 'R.A Iqlima Diana Sari',
            'nip' => '161420133',
        	'level' => 'operator',
        	'created_at' => date('Y-m-d h:m:s'),
        	'updated_at' => date('Y-m-d h:m:s')
        ]);

        DB::table('users')->insert([
            'departement_id' => 3,
        	'username' => '161420135',
        	'password' => bcrypt('smkn4plg'),
        	'name' => 'M Hafizul Ilhan',
            'nip' => '161420135',
        	'level' => 'user',
        	'created_at' => date('Y-m-d h:m:s'),
        	'updated_at' => date('Y-m-d h:m:s')
        ]);

        DB::table('users')->insert([
            'departement_id' => 4,
        	'username' => '161420136',
        	'password' => bcrypt('smkn4plg'),
        	'name' => 'R M Zulmi Ramadhan',
            'nip' => '161420136',
        	'level' => 'user',
        	'created_at' => date('Y-m-d h:m:s'),
        	'updated_at' => date('Y-m-d h:m:s')
        ]);


    }
}
