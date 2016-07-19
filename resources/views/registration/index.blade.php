@extends('layouts.app')

@section('header')
<h1>Registration</h1>
@endsection

@section('content')

@if (count($errors) > 0)
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form class="form-horizontal" id="registration" role="form" method="POST" action="{{ URL::Route('registration.confirmation') }}">
    <div class="form-group">
        <label class="control-label col-sm-2" for="first_name">First Name:</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" required id="first_name" name="first_name" value="{{{ $input['first_name'] }}}">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="last_name">Last Name:</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" required id="last_name" name="last_name" value="{{{ $input['last_name'] }}}">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="address1">Address 1:</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" required id="address1" name="address1" value="{{{ $input['address1'] }}}">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="address2">Address 2:</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="address2" name="address2" value="{{{ $input['address2'] }}}">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="city">City:</label>
        <div class="col-sm-6">
            <input type="text" required class="form-control" id="city" name="city" value="{{{ $input['city'] }}}">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="state">State:</label>
        <div class="col-sm-6">
            <input type="text" required class="form-control" maxlength="2" us-state="true" id="state" name="state" value="{{{ $input['state'] }}}">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="zip">Zip:</label>
        <div class="col-sm-3">
            <input type="text" required class="form-control" zip="true" id="zip" name="zip" value="{{{ $input['zip'] }}}">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="country">Country:</label>
        <div class="col-sm-6">
            <input type="text" required class="form-control" us-only="true" id="country" name="country" value="{{{ $input['country'] }}}">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
    {{ csrf_field() }}
</form>

@endsection

@section('js')
<script src="/js/customValidators.js"></script>
<script src="/js/addressComplete.js"></script>

<script>
    // I kept on accidentally pressing enter on the auto-complete, which submitted the form.
    // This prevents form submission by pressing enter.
    $('form').keydown(function(e) {
        if (e.keyCode == 13) {
            return false;
        }
    });

    // Initialize the validation
    $('form#registration').validate();
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDd_npCxCPVvgQDIbzk21nqAkbvogfmWTI&libraries=places&callback=addressComplete.initAutocomplete"
        async defer></script>
@endsection