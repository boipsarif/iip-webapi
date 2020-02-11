<?php

use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Teacher::create([
       	'nama' => 'Pa Asdon',
       	'jk' => 'L'
       ]);
       \App\Teacher::create([
       	'nama' => 'Bu Dewi',
       	'jk' => 'P'
       ]);
    }
}
