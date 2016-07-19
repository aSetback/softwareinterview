<?php

namespace App\Http\Controllers;

use Validator;
use App\Registration;
use Illuminate\Support\Facades\Input;
use Session;

class RegistrationController extends Controller
{

    private $rules = [
        'first_name'    => 'required|max:100',
        'last_name'     => 'required|max:100',
        'address1'      => 'required|max:255',
        'address2'      => 'max:255',
        'city'          => 'required|max:100',
        'state'         => 'required|max:2|alpha',
        'country'       => 'required|max:100',
        'zip'           => 'required|max:10|alpha_dash|min:5',
    ];

    public function getIndex()
    {
        // Retrieve any errors we have ..
        $errors = Session::get('errors', []);

        $input = $this->getInput();

        return view('registration.index', ['input' => $input, 'errors' => $errors]);
    }

    public function postConfirmation()
    {
        $input = $this->getInput();

        // Validate our input according to the above rules
        $validate = Validator::make($input, $this->rules);

        if (!$validate->passes()) {

            // Flash the errors to the session
            Session::flash('errors', $validate->errors());

            // Send the user back to the form, with their input in the query string to repopulate it.
            return redirect()->route('registration.index', $input);

        }

        return view('registration.confirmation', ['input' => $input]);
    }

    public function postSubmit()
    {
        $input = $this->getInput();

        // Re-validate, just in case.
        $validate = Validator::make($input, $this->rules);

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

    private function getInput() {
        return [
            'first_name' => Input::get('first_name'),
            'last_name'  => Input::get('last_name'),
            'address1'  => Input::get('address1'),
            'address2'  => Input::get('address2'),
            'city'      => Input::get('city'),
            'state'     => Input::get('state'),
            'country'   => 'US', // On the front end, 'US', 'USA', and 'United States are valid'.  Standardizing.
            'zip'       => Input::get('zip'),
        ];
    }
}

