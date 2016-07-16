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

<form class="form-horizontal" role="form" method="POST" action="{{ URL::Route('registration.confirmation') }}">
    <div class="form-group">
        <label class="control-label col-sm-2" for="first_name">First Name:</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="first_name" name="first_name" value="{{{ $input['first_name'] }}}">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="last_name">Last Name:</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="last_name" name="last_name" value="{{{ $input['last_name'] }}}">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="address1">Address 1:</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="address1" name="address1" value="{{{ $input['address1'] }}}">
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
            <input type="text" class="form-control" id="city" name="city" value="{{{ $input['city'] }}}">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="state">State:</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="state" name="state" value="{{{ $input['state'] }}}">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="zip">Zip:</label>
        <div class="col-sm-3">
            <input type="text" class="form-control" id="zip" name="zip" value="{{{ $input['zip'] }}}">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="country">Country:</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="country" name="country" value="{{{ $input['country'] }}}">
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

<script>
    // I kept on accidentally pressing enter on the auto-complete, which submitted the form.
    // This prevents form submission by pressing enter.
    $('form').keydown(function(e) {
        if (e.keyCode == 13) {
            return false;
        }
    });

    // set a global variable for my functions to use.
    var autocomplete;

    function initAutocomplete() {
        // Set up the autocomplete to work on the address 1 field
        autocomplete = new google.maps.places.Autocomplete(
            document.getElementById('address1'),
            {
                types: ['geocode']
            }
        );

        // When the user selects an address from the dropdown, populate the address
        // fields in the form.
        autocomplete.addListener('place_changed', fillInAddress);
        console.log('Autocomplete Initialized.');
    }

    function fillInAddress() {
        // Get the place details from the autocomplete object.
        var place = autocomplete.getPlace();

        // Let's reformat it to be more .. usable.
        for (componentKey in place.address_components) {
            var component = place.address_components[componentKey];
            // Loop through the types, and just set them inside the place object.
            for (typeKey in component.types) {
                var type = component.types[typeKey];
                // Create a new property within the place object with a name of the "type", to store the long & short names.
                place[type] = {'short_name': component.short_name, 'long_name': component.long_name};
            }
        }

        // Fill in the form!
        $('#city').val(place.locality.long_name);
        $('#state').val(place.administrative_area_level_1.long_name);
        $('#zip').val(place.postal_code.long_name);
        $('#address1').val(place.street_number.long_name + ' ' + place.route.long_name);
        $('#country').val(place.country.long_name);
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDd_npCxCPVvgQDIbzk21nqAkbvogfmWTI&libraries=places&callback=initAutocomplete"
        async defer></script>
@endsection