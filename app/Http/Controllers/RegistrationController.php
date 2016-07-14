<?php

namespace App\Http\Controllers;

use Validator;
use App\Registration;
use Illuminate\Support\Facades\Input;
use Session;

class RegistrationController extends Controller
{
    public function getIndex()
    {
        // Retrieve any errors we have ..
        $errors = Session::get('errors', []);

        // This array is used if a user hits 'back' on the confirmation, so they don't have to re-enter everything.
        $input = [
            'first_name' => Input::get('first_name'),
            'last_name'  => Input::get('last_name'),
            'address1'  => Input::get('address1'),
            'address2'  => Input::get('address2'),
            'city'      => Input::get('city'),
            'state'     => Input::get('state'),
            'country'   => Input::get('country'),
            'zip'       => Input::get('zip'),
        ];

        return view('registration.index', ['input' => $input, 'errors' => $errors]);
    }

    public function postConfirmation()
    {
        // I'm defining each one explicitly to avoid having possible issues with undefined properties in the view.
        $input = [
            'first_name' => Input::get('first_name'),
            'last_name'  => Input::get('last_name'),
            'address1'  => Input::get('address1'),
            'address2'  => Input::get('address2'),
            'city'      => Input::get('city'),
            'state'     => Input::get('state'),
            'country'   => Input::get('country'),
            'zip'       => Input::get('zip'),
        ];

        return view('registration.confirmation', ['input' => $input]);
    }

    public function postSubmit()
    {
        $input = [
            'first_name' => Input::get('first_name'),
            'last_name'  => Input::get('last_name'),
            'address1'  => Input::get('address1'),
            'address2'  => Input::get('address2'),
            'city'      => Input::get('city'),
            'state'     => Input::get('state'),
            'country'   => Input::get('country'),
            'zip'       => Input::get('zip'),
        ];

        $rules = [
            'first_name'    => 'required|max:100',
            'last_name'     => 'required|max:100',
            'address1'      => 'required|max:255',
            'address2'      => 'max:255',
            'city'          => 'required|max:100',
            'state'         => 'required|max:50|alpha',
            'country'       => 'required|max:100',
            'zip'           => 'required|max:10|alpha_dash|min:5',
        ];

        // Validate our input according to the above rules
        $validate = Validator::make($input, $rules);

        // If it passes ..
        if ($validate->passes()) {
            // Create the registration
            Registration::create(Input::all());
            // Thank the user
            return redirect()->route('registration.thanks');
        } else {
            // Flash the errors to the session
            Session::flash('errors', $validate->errors());
            // Send the user back to the form, with their input in the query string to repopulate it.
            return redirect()->route('registration.index', $input);
        }
    }

    public function getThanks()
    {
        return view('registration.thanks');
    }
}

