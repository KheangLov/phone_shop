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

        DB::table('categories')->insert([
            'name' => 'uncategorized',
            'user_id' => 1,
            'created_at' => $faker->dateTime($max = 'now', $timezone = null),
            'updated_at' => $faker->dateTime($max = 'now', $timezone = null)
        ]);

        DB::table('page_types')->insert([
            [
                'name' => 'section',
                'created_at' => $faker->dateTime($max = 'now', $timezone = null),
                'updated_at' => $faker->dateTime($max = 'now', $timezone = null)
            ],
            [
                'name' => 'grid',
                'created_at' => $faker->dateTime($max = 'now', $timezone = null),
                'updated_at' => $faker->dateTime($max = 'now', $timezone = null)
            ]
        ]);

        DB::table('pages')->insert([
            [
                'name' => 'Here’s what sets us apart.',
                'page_type_id' => 1,
                'status' => 1,
                'position' => 0,
                'created_at' => $faker->dateTime($max = 'now', $timezone = null),
                'updated_at' => $faker->dateTime($max = 'now', $timezone = null)
            ],
            [
                'name' => 'The first & only nationwide 5G network.',
                'page_type_id' => 1,
                'status' => 1,
                'position' => 1,
                'created_at' => $faker->dateTime($max = 'now', $timezone = null),
                'updated_at' => $faker->dateTime($max = 'now', $timezone = null)
            ],
            [
                'name' => 'NEVER SETTLE',
                'page_type_id' => 2,
                'status' => 1,
                'position' => 2,
                'created_at' => $faker->dateTime($max = 'now', $timezone = null),
                'updated_at' => $faker->dateTime($max = 'now', $timezone = null)
            ],
            [
                'name' => 'ASUS ROG PHONE',
                'page_type_id' => 2,
                'status' => 1,
                'position' => 3,
                'created_at' => $faker->dateTime($max = 'now', $timezone = null),
                'updated_at' => $faker->dateTime($max = 'now', $timezone = null)
            ]
        ]);

        DB::table('posts')->insert([
            [
                'title' => 'The first & only nationwide 5G network.',
                'content' => 'T-Mobile\'s 5G network reaches more cities and towns in America than anyone else.',
                'page_id' => 1,
                'created_at' => $faker->dateTime($max = 'now', $timezone = null),
                'updated_at' => $faker->dateTime($max = 'now', $timezone = null)
            ],
            [
                'title' => 'NEVER SETTLE',
                'content' => 'Our goal? To share the best technology with the world, hand-in-hand with you.',
                'page_id' => 2,
                'created_at' => $faker->dateTime($max = 'now', $timezone = null),
                'updated_at' => $faker->dateTime($max = 'now', $timezone = null)
            ],
            [
                'title' => 'Customer crazed, employee committed.',
                'content' => 'The moves we\'ve made for our customers and employees haven\'t gone unnoticed.',
                'page_id' => 3,
                'created_at' => $faker->dateTime($max = 'now', $timezone = null),
                'updated_at' => $faker->dateTime($max = 'now', $timezone = null)
            ],
            [
                'title' => 'We\'re about more than dollars and cents.',
                'content' => 'From disaster relief efforts to renewable energy initiatives, we recognize our responsibility.',
                'page_id' => 3,
                'created_at' => $faker->dateTime($max = 'now', $timezone = null),
                'updated_at' => $faker->dateTime($max = 'now', $timezone = null)
            ],
            [
                'title' => 'We\'re moving beyond telecom.',
                'content' => 'While our network grows, we’re leading innovation for the mobile web and Internet of Things.',
                'page_id' => 3,
                'created_at' => $faker->dateTime($max = 'now', $timezone = null),
                'updated_at' => $faker->dateTime($max = 'now', $timezone = null)
            ],
            [
                'title' => 'Snapdragon 845 powered ASUS ROG Phone is a real game-changer',
                'content' => 'The phone has all of the features gamers will want: unprecedented speeds with Gigabit LTE and Multi-Gigabit 60 GHz Wi-Fi, configurable up to a massive 512 GB for plenty of game storage, an advanced cooling system, visual and audio technologies that captivate, and a unique design inspired by the traditional video game console. The Snapdragon 845 supports all of this and more, ensuring that the high-performance ROG Phone lives up to gamers’ unshakable standards.',
                'page_id' => 4,
                'thumbnail' => 'images/post/1582734339.png',
                'created_at' => $faker->dateTime($max = 'now', $timezone = null),
                'updated_at' => $faker->dateTime($max = 'now', $timezone = null)
            ]
        ]);

        // DB::table('categories')->insert([
        //     [
        //         'name' => 'Oneplus',
        //         'user_id' => 1,
        //         'created_at' => $faker->dateTime($max = 'now', $timezone = null),
        //         'updated_at' => $faker->dateTime($max = 'now', $timezone = null)
        //     ],
        //     [
        //         'name' => 'ASUS',
        //         'user_id' => 1,
        //         'created_at' => $faker->dateTime($max = 'now', $timezone = null),
        //         'updated_at' => $faker->dateTime($max = 'now', $timezone = null)
        //     ],
        //     [
        //         'name' => 'Xiaomi',
        //         'user_id' => 1,
        //         'created_at' => $faker->dateTime($max = 'now', $timezone = null),
        //         'updated_at' => $faker->dateTime($max = 'now', $timezone = null)
        //     ],
        //     [
        //         'name' => 'NUBIA',
        //         'user_id' => 1,
        //         'created_at' => $faker->dateTime($max = 'now', $timezone = null),
        //         'updated_at' => $faker->dateTime($max = 'now', $timezone = null)
        //     ]
        // ]);

        // DB::table('products')->insert([
        //     [
        //         'name' => 'OnePlus 7T Pro McLaren',
        //         'price' => 749,
        //         'discount' => 7,
        //         'description' => 'New from oneplus',
        //         'thumbnail' => 'images/1582694481.png',
        //         'user_id' => 1,
        //         'category_id' => 2,
        //         'created_at' => $faker->dateTime($max = 'now', $timezone = null),
        //         'updated_at' => $faker->dateTime($max = 'now', $timezone = null)
        //     ],
        //     [
        //         'name' => 'Mi Note 10 Pro',
        //         'price' => 599,
        //         'discount' => 7,
        //         'description' => 'New from company',
        //         'thumbnail' => 'images/1582698694.png',
        //         'user_id' => 1,
        //         'category_id' => 4,
        //         'created_at' => $faker->dateTime($max = 'now', $timezone = null),
        //         'updated_at' => $faker->dateTime($max = 'now', $timezone = null)
        //     ],
        //     [
        //         'name' => 'Asus ROG Phone2 (Republic of Gamers)',
        //         'price' => 629,
        //         'discount' => 0,
        //         'description' => 'Republic of Gamer',
        //         'thumbnail' => 'images/1582707642.jpeg',
        //         'user_id' => 1,
        //         'category_id' => 3,
        //         'created_at' => $faker->dateTime($max = 'now', $timezone = null),
        //         'updated_at' => $faker->dateTime($max = 'now', $timezone = null)
        //     ],
        //     [
        //         'name' => 'Nubia Red Magic 3S',
        //         'price' => 449,
        //         'discount' => 0,
        //         'description' => 'NUBIA',
        //         'thumbnail' => 'images/1582707767.png',
        //         'user_id' => 1,
        //         'category_id' => 5,
        //         'created_at' => $faker->dateTime($max = 'now', $timezone = null),
        //         'updated_at' => $faker->dateTime($max = 'now', $timezone = null)
        //     ]
        // ]);

        // DB::table('sliders')->insert([
        //     [
        //         'name' => 'image_slider',
        //         'path' => 'images/slide/1582693552.jpeg',
        //         'created_at' => $faker->dateTime($max = 'now', $timezone = null),
        //         'updated_at' => $faker->dateTime($max = 'now', $timezone = null)
        //     ],
        //     [
        //         'name' => 'phonethree',
        //         'path' => 'images/slide/1582693602.jpeg',
        //         'created_at' => $faker->dateTime($max = 'now', $timezone = null),
        //         'updated_at' => $faker->dateTime($max = 'now', $timezone = null)
        //     ],
        //     [
        //         'name' => 'huewei',
        //         'path' => 'images/slide/1582693669.jpeg',
        //         'created_at' => $faker->dateTime($max = 'now', $timezone = null),
        //         'updated_at' => $faker->dateTime($max = 'now', $timezone = null)
        //     ]
        // ]);
    }
}
