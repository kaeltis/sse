<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'firstname' => 'required|max:255',
            'street' => 'required|max:255',
            'housenumber' => 'required|max:10',
            'zipcode' => 'required|max:10',
            'city' => 'required|max:255',
            'phone' => 'required|max:20',
            'birthdate' => 'required|date',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'firstname' => $data['firstname'],
            'street' => $data['street'],
            'housenumber' => $data['housenumber'],
            'zipcode' => $data['zipcode'],
            'city' => $data['city'],
            'phone' => $data['phone'],
            'birthdate' => $data['birthdate'],
            'sharetoken' => str_random(32),
        ]);

        //Attach some random courses for CTF
        foreach ($this->randomGen(1001, 1050, 5) as $index) {
            $user->courses()->attach($index, ['grade' => random_int(1, 5)]);
        }

        return $user;
    }

    private function randomGen($min, $max, $quantity)
    {
        $numbers = range($min, $max);
        shuffle($numbers);
        return array_slice($numbers, 0, $quantity);
    }
}
