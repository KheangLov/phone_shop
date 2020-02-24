<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        DB::table('roles')->insert([
            ['name' => 'admin'],
            ['name' => 'user']
        ]);

        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin' . '@gmail.com',
            'email_verified_at' => $faker->dateTime($max = 'now', $timezone = null),
            'password' => bcrypt('not4you'),
            'role_id' => 1,
            'profile' => 'images/avatar_profile_user_music_headphones_shirt_cool-512.png',
            'created_at' => $faker->dateTime($max = 'now', $timezone = null),
            'updated_at' => $faker->dateTime($max = 'now', $timezone = null)
        ]);
    }
}
