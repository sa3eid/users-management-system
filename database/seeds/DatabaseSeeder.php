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
        DB::table('persons')->insert(
            [
                [
                    // 'Name' => Str::random(10),
                    // 'Nationality' => Str::random(10),
                    // 'Residence' => Str::random(10),

                    'Name' => 'Georgina Rodriguez',
                    'Nationality' => 'Argentinian',
                    'Residence' => 'Turin',
                    'Email' => Str::random(10) . '@gmail.com',
                    // 'password' => Hash::make('password'),
                    // 'password' => bcrypt('secret'),
                    'Age' => rand(0, 100),
                ],
                [
                    'Name' => 'Irina Shayk',
                    'Nationality' => 'Russian',
                    'Residence' => 'NYC',
                    'Email' => Str::random(10) . '@gmail.com',
                    'Age' => rand(0, 100),


                ],
                [
                    'Name' => 'Emily Ratajkowski',
                    'Nationality' => 'American',
                    'Residence' => 'California',
                    'Email' => Str::random(10) . '@gmail.com',
                    'Age' => rand(0, 100),

                ]
            ]

        );
    }
}
