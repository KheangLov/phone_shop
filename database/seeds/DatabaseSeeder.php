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
                'name' => 'our vision',
                'page_type_id' => 1,
                'status' => 1,
                'position' => 0,
                'created_at' => $faker->dateTime($max = 'now', $timezone = null),
                'updated_at' => $faker->dateTime($max = 'now', $timezone = null)
            ],
            [
                'name' => 'our mission',
                'page_type_id' => 1,
                'status' => 1,
                'position' => 1,
                'created_at' => $faker->dateTime($max = 'now', $timezone = null),
                'updated_at' => $faker->dateTime($max = 'now', $timezone = null)
            ],
            [
                'name' => 'our services',
                'page_type_id' => 2,
                'status' => 1,
                'position' => 2,
                'created_at' => $faker->dateTime($max = 'now', $timezone = null),
                'updated_at' => $faker->dateTime($max = 'now', $timezone = null)
            ]
        ]);

        DB::table('posts')->insert([
            [
                'title' => 'Our vision',
                'content' => 'As a Japanese company, we focus on quality in our products and services. We strive to provide the best alternative plans in IT solutions.',
                'page_id' => 1,
                'created_at' => $faker->dateTime($max = 'now', $timezone = null),
                'updated_at' => $faker->dateTime($max = 'now', $timezone = null)
            ],
            [
                'title' => 'Our mission',
                'content' => 'We understand that technology could make a big difference for your entire business operation. That is why we want to be everyday solution to help your business run successfully. Our team works on every task ranging from small to big projects by carrying with core concepts and values. Started in 2007, we are No. 1 SEO company in Japan. Still we are committed to become a leading digital marketing company in Cambodia.',
                'page_id' => 2,
                'created_at' => $faker->dateTime($max = 'now', $timezone = null),
                'updated_at' => $faker->dateTime($max = 'now', $timezone = null)
            ],
            [
                'title' => 'Digital Marketing',
                'content' => 'Increase sale and your brandawareness via facebook marketing solutions.',
                'thumbnail' => 'images/post/1582686750.png',
                'page_id' => 3,
                'created_at' => $faker->dateTime($max = 'now', $timezone = null),
                'updated_at' => $faker->dateTime($max = 'now', $timezone = null)
            ],
            [
                'title' => 'Chatbot',
                'content' => 'Make Conversation Easier and More Engaged with Chatbot. For More Details.',
                'thumbnail' => 'images/post/1582688756.png',
                'page_id' => 3,
                'created_at' => $faker->dateTime($max = 'now', $timezone = null),
                'updated_at' => $faker->dateTime($max = 'now', $timezone = null)
            ],
            [
                'title' => 'Web Development',
                'content' => 'Your website is your business appearance. Present yourself as professional and reliable.',
                'thumbnail' => 'images/post/1582688767.png',
                'page_id' => 3,
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
        //     ],
        //     [
        //         'name' => '1582727939.png',
        //         'path' => 'images/slide/1582727939.png',
        //         'created_at' => $faker->dateTime($max = 'now', $timezone = null),
        //         'updated_at' => $faker->dateTime($max = 'now', $timezone = null)
        //     ]
        // ]);
    }
}
