# JobFLEX Code Interview

## App Set-up:
* Pull the code from github
* Create an empty database for the app.
* Edit app/database.php, with a valid mysql user/pass/db name
* Run `composer install` from the base directory of the app
* Verify permission on /storage are correct
* Run `php artisan migrate --env=local` the base directory of the app
* Run `php artisan db:seed --env=local` from the base directory of the app
* Set up your vhost

## URLs & Login
The test user for this app is "test@user.com"
The password for the user is "ThePassword1!"
To log into the app, visit /login -- you will be redirected to the admin after login.
Going to / should bring you to the front end of the app.