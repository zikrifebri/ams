<?php

use Illuminate\Database\Seeder;

class skSeeder extends Seeder
{
    public function run()
    {
        DB::table('tbl_surat_keluar')->insert([
        	'no_agenda' => '1',
        	'no_surat' => '20/2021/Dep.TI',
        	'id_departement' => '2',
            'isi' => 'Surat Penting',
        	'kode' => '2320',
        	'tgl_surat' => '2021-07-20',
        	'keterangan' => 'Diterima'
        ]);

        DB::table('tbl_surat_keluar')->insert([
        	'no_agenda' => '2',
        	'no_surat' => '20/2021/Dep.K3',
        	'id_departement' => '1',
            'isi' => 'Surat Penting',
        	'kode' => '2330',
        	'tgl_surat' => '2021-07-20',
        	'keterangan' => 'Diterima'
        ]);
    }
}
