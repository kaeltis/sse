<?php

use Illuminate\Database\Seeder;

class CourseUserTableSeeder extends Seeder
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
            DB::table('course_user')->insert([
                'course_id' => $faker->numberBetween(1001, 1050),
                'user_id' => $faker->numberBetween(1710001, 1710061),
                'grade' => $faker->numberBetween(1, 5)
            ]);
        }
    }
}
