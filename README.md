# Laravel Tests
This repo is a companion to the 'Writing Feature/Unit Tests for Laravel' guide on Evoluted.net

## Set up
1. Clone this repo locally
1. Run `composer install` to add the packages
1. Set up a `.env` file by copying `.env.example` and changing the details were appropriate
1. Run `php artisan migrate` to create the database structure
1. Run `php artisan db:seed` to set up user accounts
1. Visit the site in browser, you should see the placeholder homepage if everything is working!

You can head to /admin to login (default details are admin@admin.com / secret)

## Developing Tests
You can find all the tests that came with Laravel Boilerplate and the examples from our guide in the `tests` directory.

## Running Tests
In your terminal, use the following command to run tests using PHPunit:

```
 vendor/bin/phpunit --testdox --stop-on-error --stop-on-failure --log-junit phpunitjunit.xml
```
