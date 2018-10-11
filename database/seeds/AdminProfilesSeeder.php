<?php

use Illuminate\Database\Seeder;

class AdminProfilesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('admin_profiles')->insert([
          'admin_id' => 1,
          'first_name' => 'Hossain',
          'last_name' => 'Azad',
          'city' => 'Dhaka',
          'country' => 'Bangladesh',
          'email' => 'shohag.rng@gmail.com',
          'about_me' => 'Hi I am Hossain Azad working on Web Development',
          'profile_pic' => 'admin_images/6E9I4oPE1no5RG5E9CTRY0RUUrniTfP2rKoTwG7y.jpeg',
          'quote' => 'Earth is moving, you should move on...'
      ]);
    }
}
