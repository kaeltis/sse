<?php

use App\Course;
use App\User;
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

        $users = User::get()->lists('id')->all();
        $courses = Course::get()->lists('id')->all();

        foreach (range(1, 250) as $index) {
            try {
                DB::table('course_user')->insert([
                    'course_id' => $faker->randomElement($courses),
                    'user_id' => $faker->randomElement($users),
                    'grade' => $faker->numberBetween(1, 5)
                ]);
            } catch (\Illuminate\Database\QueryException $queryException) {
                print 'Skipping duplicate';
            }
        }
    }
}
