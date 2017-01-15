<?php

use Illuminate\Database\Seeder;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('de_DE');

        foreach (range(1, 50) as $index) {
            DB::table('courses')->insert([
                'name' => $faker->colorName . ' ' . $faker->jobTitle,
                'semester' => $faker->randomElement(['WS', 'SS']).$faker->year,
            ]);
        }
    }
}
