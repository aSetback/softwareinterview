// Add a custom validator for zip code ..
$.validator.addMethod('zip', function(value, element) {
    return /^\d{5}(?:-\d{4})?$/.test(value);
}, 'Please enter a valid zip code.');

// Add a custom validator for country ..
$.validator.addMethod('us-only', function(value, element) {
    return (
        value.toLowerCase() == 'us' ||
            value.toLowerCase() == 'usa' ||
            value.toLowerCase() == 'united states'
        );
}, 'Registration is only available for the United States.');

$.validator.addMethod('us-state', function(value, element) {
    // All US states ..
    var states = [
        "AL", "AK", "AZ", "AR", "CA", "CO", "CT", "DE", "FL", "GA",
        "HI", "ID", "IL", "IN", "IA", "KS", "KY", "LA", "ME", "MD",
        "MA", "MI", "MN", "MS", "MO", "MT", "NE", "NV", "NH", "NJ",
        "NM", "NY", "NC", "ND", "OH", "OK", "OR", "PA", "RI", "SC",
        "SD", "TN", "TX", "UT", "VT", "VA", "WA", "WV", "WI", "WY",
    ];

    return $.inArray(value.toUpperCase(), states) != -1;
}, 'Please enter a valid US state.');