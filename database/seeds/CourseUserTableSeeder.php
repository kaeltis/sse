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

        $users = DB::table('users')->pluck('id')->all();
        $courses = DB::table('courses')->pluck('id')->all();

        foreach (range(1, 250) as $index) {
            try {
                DB::table('course_user')->insert([
                    'course_id' => $faker->randomElement($courses),
                    'user_id' => $faker->randomElement($users),
                    'grade' => $faker->numberBetween(1, 5)
                ]);
            } catch (\Illuminate\Database\QueryException $queryException) {
                print 'Skipping duplicate\n';
            }
        }
    }
}
