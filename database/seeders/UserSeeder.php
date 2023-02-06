<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('users')->insert([
            'id_card' => '21099',
            'password' => Hash::make('p.21099'),
            'name' => 'Siti Puspita',
            'born_date' => '1974-10-22',
            'gender' => 'famele',
            'address' => 'Ki. Raya Satiabudhi No. 790',
        ]);
    }
}
