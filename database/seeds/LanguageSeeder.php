<?php

use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::create([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'wediariasantana@gmail.com',
            'role' => 'A',
            'password' => bcrypt('admin'),
        ]);

        \App\Models\Language::create([
            'code' => 'gb',
            'name' => 'English',
            'display' => 'UK English Female',
            'image' => 'United-Kingdom.png',
        ]);       

        \App\Models\Language::create([
            'code' => 'id',
            'name' => 'Indonesian',
            'display' => 'Indonesian Female',
            'image' => 'Indonesia.png',
        ]);

        \App\Models\Setting::create([
            'language_id' => 1,
            'name' => 'Company name',
            'bus_no' => '',
            'address' => '',
            'email' => 'company_email@example.com',
            'phone' => '',
            'location' => '',
            'notification' => '',
            'size' => 35,
            'color' => '#f7184e',
            'logo' => '',
            'over_time' => 20,
            'missed_time' => 20,
        ]);
    }
}
