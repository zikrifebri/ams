<?php

use Illuminate\Database\Seeder;

class departementSeeder extends Seeder
{
    public function run()
    {
        DB::table('departement')->insert([
        	'id' => '1',
        	'nama_departement' => 'Dep TI'
        ]);

        DB::table('departement')->insert([
        	'id' => '2',
        	'nama_departement' => 'Dep K3'
        ]);

		DB::table('departement')->insert([
        	'id' => '3',
        	'nama_departement' => 'Dep Mesin'
        ]);
    }
}
