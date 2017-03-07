<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserTableSeeder::class);
        DB::table('classes')->insert([
            'name' => 'K58T'
        ]);
        DB::table('classes')->insert([
            'name' => 'K58C'
        ]);
        DB::table('classes')->insert([
            'name' => 'K58N'
        ]);
    }
}
