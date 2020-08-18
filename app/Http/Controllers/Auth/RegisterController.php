<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    private $password_regex;
    private $phone_regex;
    private $name_regex;

    private const PASSWORD_REGEX = '^(?=.*[a-z])(?=.*[A-Z])(?=.*[@$!%*?&])[A-Za-z$%&!:]{6,}$';  // aaAA$$
    private const PHONE_REGEX = '\+?7(\d{10})';
    private const NAME_REGEX = '[a-z][A-Z]';

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->password_regex = self::PASSWORD_REGEX;
        $this->phone_regex = self::PHONE_REGEX;
        $this->name_regex = self::NAME_REGEX;
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    { /*aaAA12$*/
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255', "regex:/$this->name_regex/"],
            'phone' => ['required', "regex:/$this->phone_regex/", 'max:12'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed', "regex:/$this->password_regex/"],
        ], [
            'name.regex' => trans('validation.name_register_validation'),
            'password.regex' => trans('passwords.registration.invalid_format'),
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'api_token' => Str::random(80),
        ]);
    }
}
