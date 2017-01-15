<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('de_DE');

        DB::table('users')->insert([
            'name' => $faker->lastName,
            'firstname' => $faker->firstName,
            'email' => 'test@test.test',
            'password' => bcrypt('gnDeEjNcfYb4ADEWCgCwy24p'),
            'street' => $faker->streetName,
            'housenumber' => $faker->buildingNumber,
            'zipcode' => $faker->postcode,
            'city' => $faker->city,
            'phone' => $faker->phoneNumber,
            'birthdate' => $faker->dateTimeThisCentury->format('Y-m-d'),
            'sharetoken' => str_random(32),
            'role' => \App\User::EMPLOYEE,
        ]);

        foreach (range(1, 5) as $index) {
            DB::table('users')->insert([
                'name' => $faker->lastName,
                'firstname' => $faker->firstName,
                'email' => $faker->email,
                'password' => bcrypt($faker->password),
                'street' => $faker->streetName,
                'housenumber' => $faker->buildingNumber,
                'zipcode' => $faker->postcode,
                'city' => $faker->city,
                'phone' => $faker->phoneNumber,
                'birthdate' => $faker->dateTimeThisCentury->format('Y-m-d'),
                'sharetoken' => str_random(32),
                'role' => \App\User::EMPLOYEE,
            ]);
        }

        foreach (range(1, 5) as $index) {
            DB::table('users')->insert([
                'name' => $faker->lastName,
                'firstname' => $faker->firstName,
                'email' => $faker->email,
                'password' => bcrypt($faker->password),
                'street' => $faker->streetName,
                'housenumber' => $faker->buildingNumber,
                'zipcode' => $faker->postcode,
                'city' => $faker->city,
                'phone' => $faker->phoneNumber,
                'birthdate' => $faker->dateTimeThisCentury->format('Y-m-d'),
                'sharetoken' => str_random(32),
                'role' => \App\User::PROFESSOR,
            ]);
        }

        foreach (range(1, 20) as $index) {
            DB::table('users')->insert([
                'name' => $faker->lastName,
                'firstname' => $faker->firstName,
                'email' => $faker->email,
                'password' => bcrypt($faker->password),
                'street' => $faker->streetName,
                'housenumber' => $faker->buildingNumber,
                'zipcode' => $faker->postcode,
                'city' => $faker->city,
                'phone' => $faker->phoneNumber,
                'birthdate' => $faker->dateTimeThisCentury->format('Y-m-d'),
                'sharetoken' => str_random(32),
            ]);
        }
    }
}
