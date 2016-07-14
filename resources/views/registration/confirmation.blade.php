@extends('layouts.app')

@section('header')
<h1>Confirmation</h1>
@endsection

@section('content')
<form class="form-horizontal" role="form" method="POST" action="{{ URL::Route('registration.submit') }}">
    <div class="form-group">
        <div class="col-sm-2 text-right">
            <strong>First Name:</strong>
        </div>
        <div class="col-sm-6">
            {{ $input['first_name'] }}
            <input type="hidden" class="form-control" id="first_name" name="first_name" value="{{{ $input['first_name'] }}}">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 text-right">
            <strong>Last Name:</strong>
        </div>
        <div class="col-sm-6">
            {{ $input['last_name'] }}
            <input type="hidden" class="form-control" id="last_name" name="last_name" value="{{{ $input['last_name'] }}}">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 text-right">
            <strong>Address 1:</strong>
        </div>
        <div class="col-sm-6">
            {{ $input['address1'] }}
            <input type="hidden" class="form-control" id="address1" name="address1" value="{{{ $input['address1'] }}}">
        </div>
    </div>

    {{-- Let's only show address2 if they put one in. --}}
    @if ($input['address2'])
    <div class="form-group">
        <div class="col-sm-2 text-right">
            <strong>Address 2:</strong>
        </div>
        <div class="col-sm-6">
            {{ $input['address2'] }}
            <input type="hidden" class="form-control" id="address2" name="address2" value="{{{ $input['address2'] }}}">
        </div>
    </div>
    @endif

    <div class="form-group">
        <div class="col-sm-2 text-right">
            <strong>City</strong>:</strong>
        </div>
        <div class="col-sm-6">
            {{ $input['city'] }}
            <input type="hidden" class="form-control" id="city" name="city" value="{{{ $input['city'] }}}">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 text-right">
            <strong>State:</strong>
        </div>
        <div class="col-sm-6">
            {{ $input['state'] }}
            <input type="hidden" class="form-control" id="state" name="state" value="{{{ $input['state'] }}}">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 text-right">
            <strong>Zip:</strong>
        </div>
        <div class="col-sm-3">
            {{ $input['zip'] }}
            <input type="hidden" class="form-control" id="zip" name="zip" value="{{{ $input['zip'] }}}">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 text-right">
            <strong>Country:</strong>
        </div>
        <div class="col-sm-6">
            {{ $input['country'] }}
            <input type="hidden" class="form-control" id="country" name="country" value="{{{ $input['country'] }}}">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <a href="/registration/index?{{{ http_build_query($input) }}}">
                <button type="button" class="btn btn-secondary">&larr; Back</button>
            </a>
            <button type="submit" class="btn btn-primary">Confirm</button>
        </div>
    </div>
    {{ csrf_field() }}
</form>

@endsection