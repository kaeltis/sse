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

        foreach (range(1, 30) as $index) {
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
                'birthday' => $faker->dateTimeThisCentury->format('Y-m-d'),
                'sharetoken' => str_random(32),
            ]);
        }
    }
}
