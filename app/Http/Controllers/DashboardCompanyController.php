<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class DashboardCompanyController extends Controller
{
    public function index() {
        $user = Auth::user();
        return view('company.dashboard.profile')->with('user', $user);
    }

    public function updateProfile(Request $data) {
        $user = Auth::user();

        $data->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id, 'id')],
            'surname' => ['required', 'string', 'max:255'],
            'companyName' => ['required', 'string', 'max:255'],
            'description'=> ['nullable','string'],
            'vatNumber' => ['required', 'numeric', 'digits:11'],
            'slogan' => ['nullable', 'string', 'max:255'],
            'companyForm' => ['required', 'string', 'max:255'],
            'foundationYear' => ['required', 'numeric', 'min:0'],
            'employeesNumber' => ['required', 'numeric', 'min:0'],
            'website' => ['nullable', 'string', 'max:255'],
            'phoneContact' => ['nullable','string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'country' => ['required', 'string', 'max:255'],
            'typeWorkingPlace' => [
                'required',
                Rule::in(['legal', 'commercial', 'operative']),
            ]
        ]);

        $user->name = $data->input('name');
        $user->surname = $data->input('surname');
        $user->email = $data->input('email');
        if($data->avatar != null) {
            $newImageName = 'users/' . time() . "-" . $data->input('companyName') . "-" . $user->id . '.' . $data->avatar->extension();
            $data->avatar->move(public_path('storage/users'), $newImageName);
            $user->avatar = $newImageName;
        }
        $user->save();

        $company = $user->company;
        $company->name = $data['companyName'];
        $company->overview = $data['description'];
        $company->website = $data['website'];
        $company->slogan = $data['slogan'];
        $company->employees_number = $data['employeesNumber'];
        $company->foundation_year = $data['foundationYear'];
        $company->company_form = $data['companyForm'];
        $company->vat_number = $data['vatNumber'];
        $company->telephone = $data['phoneContact'];
        $company->save();

        $workingPlace = $company->mainPlaceOfWork();
        $workingPlace->address = $data['address'];
        $workingPlace->city = $data['city'];
        $workingPlace->country = $data['country'];
        $workingPlace->type = $data['typeWorkingPlace'];
        $workingPlace->primary = true;
        $workingPlace->save();

        return back()->with('success', __('dashboard/company/profile.success'));
    }

    public function workingPlaces() {
        $user = Auth::user();
        return view('company.dashboard.working-places')->with('workingPlaces', $user->company->workingPlaces);
    }
}
