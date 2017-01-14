<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * App\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $remember_token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $firstname
 * @property string $street
 * @property string $housenumber
 * @property string $zipcode
 * @property string $city
 * @property string $phone
 * @property string $birthdate
 * @property string $role
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Course[] $courses
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @method static \Illuminate\Database\Query\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereFirstname($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereStreet($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereHousenumber($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereZipcode($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereCity($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User wherePhone($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereBirthdate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereRole($value)
 * @mixin \Eloquent
 */
class User extends Authenticatable
{
    use Notifiable;

    const STUDENT = 's';
    const PROFESSOR = 'p';
    const EMPLOYEE = 'e';

    public static $roles = [
        self::STUDENT => 'Student',
        self::PROFESSOR => 'Professor',
        self::EMPLOYEE => 'Employee'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'firstname', 'street', 'housenumber', 'zipcode', 'city', 'phone', 'birthdate', 'role', 'sharetoken',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isStudent()
    {
        return $this->role == self::STUDENT;
    }

    public function isProfessor()
    {
        return $this->role == self::PROFESSOR;
    }

    public function isEmployee()
    {
        return $this->role == self::EMPLOYEE;
    }

    public function courses()
    {
        return $this->belongsToMany('App\Course')->withPivot('grade');
    }
}
