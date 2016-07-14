@extends('layouts.app')

@section('header')
<h1>Welcome</h1>
@endsection

@section('content')
    <div class="col-sm-4"></div>
    <div class="col-sm-4">
        <h3 class="text-center">Thanks for your interest!</h3>
        <p class="text-center">
            Please provide a little more information about yourself so we can better serve you!<br />
            <br />
            <a href="{{ URL::Route('registration.index') }}">
                <button class="btn btn-primary">Register &rarr;</button>
            </a>
        </p>
    </div>
    <div class="col-sm-4"></div>
@endsection
