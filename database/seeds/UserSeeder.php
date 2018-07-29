<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=array(
            'name'=>'Andhika',
            'email'=>'andhika@admin.com',
            'password'=>Hash::make('aag123'),
            'created_at'=>DB::raw('NOW()'),
            'updated_at'=>DB::raw('NOW()'),
        );

        DB::table('users')->insert($user);
    }
}
