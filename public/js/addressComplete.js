var addressComplete = {
    // set a global variable for my functions to use.
    autocomplete: {},

    initAutocomplete: function() {
        // Set up the autocomplete to work on the address 1 field
        addressComplete.autocomplete = new google.maps.places.Autocomplete(
            document.getElementById('address1'),
            {
                types: ['geocode']
            }
        );

        // When the user selects an address from the dropdown, populate the address
        // fields in the form.
        addressComplete.autocomplete.addListener('place_changed', addressComplete.fillInAddress);
        console.log('Autocomplete Initialized.');
    },

    fillInAddress: function() {
        // Get the place details from the autocomplete object.
        var place = addressComplete.autocomplete.getPlace();

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
        $('#state').val(place.administrative_area_level_1.short_name);
        $('#zip').val(place.postal_code.long_name);
        $('#address1').val(place.street_number.long_name + ' ' + place.route.long_name);
        $('#country').val(place.country.long_name);
    }


}
