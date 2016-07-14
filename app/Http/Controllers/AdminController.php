<?php

namespace App\Http\Controllers;

use App\Registration;

class AdminController extends Controller
{
    public function getIndex()
    {
        $registrations = Registration::orderBy('created_at', 'DESC')->get();
        return view('admin.index')->with('registrations', $registrations);
    }

}


