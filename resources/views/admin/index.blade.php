@extends('layouts.app')

@section('header')
<h1>Admin</h1>
@endsection

@section('content')
    <div class="col-sm-1"></div>
    <div class="col-sm-10">
        <h3>Registrations</h3>
        <table class="table table-striped table-bordered">
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Address</th>
                <th>City</th>
                <th>State</th>
                <th>Country</th>
                <th>Zip</th>
                <th>Created At</th>
            </tr>
            @foreach ($registrations AS $registration)
                <tr>
                    <td>{{ $registration->first_name}}</td>
                    <td>{{ $registration->last_name }}</td>
                    <td>
                        {{ $registration->address1}}
                        @if (!empty($registration->address2))
                            <br />
                            {{ $registration->address2 }}
                        @endif
                    </td>
                    <td>{{ $registration->city }}</td>
                    <td>{{ $registration->state }}</td>
                    <td>{{ $registration->country }}</td>
                    <td>{{ $registration->zip }}</td>
                    <td>{{ date('F j, Y @ g:i A', strtotime($registration->created_at)) }}</td>
                </tr>
            @endforeach
        </table>
    </div>
    <div class="col-sm-1"></div>
@endsection
