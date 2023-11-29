<?php

namespace Database\Seeders;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class todo extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $value) {

            DB::table('todoapps')->insert([

                'title' => $faker->title(),
                'description' => 'Description for Task 2',
                'due_date' => now()->addDays(3), 
                'status' => 'progress',
            ]);
        }
    }
}
