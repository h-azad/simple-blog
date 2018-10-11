<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('admins')->insert([
          'name' => 'Hossain Azad',
          'email' => 'admin@admin.com',
          'job_title' => 'Super Admin',
          'password' => bcrypt('123456'),
      ]);
    }
}
