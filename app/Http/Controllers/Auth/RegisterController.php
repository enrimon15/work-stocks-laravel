<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\CommercialContact;
use App\Models\Company;
use App\Models\PlacesOfWork;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use TCG\Voyager\Models\Role;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /*private function messages()
    {
        return [
            'email.unique' => 'La email è già presente nel sistema',
            'email.*' => 'La email non è valida',
            'name.*' => 'Il nome non è valido',
            'surname.*' => 'Il cognome non è valido',
            'password.confirmed' => 'Le due password non coincidono',
            'password.*' => 'La password non è valida, controlla che sia almeno 8 caratteri',
            'user_type.*' => 'La tipologia utente non è valida'
        ];
    }*/

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        if ($data['user_type'] == 'user') { //user
            return Validator::make($data, [
                'name' => ['required', 'string', 'max:255'],
                'surname' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'user_type' => [
                    'required',
                    Rule::in(['user', 'company']),
                ],
            ]);
        } else { //company
            return Validator::make($data, [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'surname' => ['required', 'string', 'max:255'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'user_type' => [
                    'required',
                    Rule::in(['user', 'company']),
                ],
                'companyName' => ['required', 'string', 'max:255'],
                'vattinNumber' => ['required', 'numeric', 'digits:11'],
                'companyForm' => ['required', 'string', 'max:255'],
                'foundationYear' => ['required', 'numeric', 'min:0'],
                'employeesNumber' => ['required', 'numeric', 'min:0'],
                'website' => ['nullable', 'string', 'max:255'],
                'contactPhone' => ['nullable','string', 'max:255'],
                'address' => ['required', 'string', 'max:255'],
                'city' => ['required', 'string', 'max:255'],
                'country' => ['required', 'string', 'max:255'],
                'workingPlaceType' => [
                    'required',
                    Rule::in(['legal', 'commercial', 'operative']),
                ]
            ]);
        }
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $role = Role::where('name', '=', $data['user_type'])->firstOrFail();

        $user = User::create([
            'name' => $data['name'],
            'surname' => $data['surname'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        $user->roles()->save($role);

        if ($data['user_type'] == 'company') {
            $company = new Company();
            $company->name = $data['companyName'];
            $company->website = $data['website'];
            $company->employees_number = $data['employeesNumber'];
            $company->foundation_year = $data['foundationYear'];
            $company->company_form = $data['companyForm'];
            $company->vat_number = $data['vatNumber'];
            $company->telephone = $data['contactPhone'];

            $user->company()->save($company);

            $workingPlace = new PlacesOfWork();
            $workingPlace->address = $data['address'];
            $workingPlace->city = $data['city'];
            $workingPlace->country = $data['country'];
            $workingPlace->type = $data['workingPlaceType'];
            $workingPlace->primary = true;
            $workingPlace->company()->associate($company);
            $workingPlace->save();
        }

        return $user;
    }
}
