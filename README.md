Outhotels - Backend
===
OurHotels is a hotel search solution that look into many providers and display results from 
all the available hotels, for now we are aggregate from two providers: BestHotels and  TopHotel
 
## Requirements
The project is based on the version `6.x` of the Laravel framework, 
so make sure that you are satisfying the requirements
listed in the [framework's documentation](https://laravel.com/docs/6.x#server-requirements)

## Installation
Run the following commands in order to get a running version of the application:

1. Clone the repository `git clone  https://github.com/AlShahawi/ourhotels-backend.git`
2. Get into the directory `cd ourhotels-backend`
4. Check that your environment satisfy the requirements `composer check-platform-reqs`
3. Install composer dependencies `composer install`
4. Setup your envorinment `cp .env.example .env`
5. Generate app secret key `php artisan key:generate`

Now you have a ready to run application.

## How To?

### Running Automated Tests
Run the following command:
```bash
./vendor/bin/phpunit
```

### Start The Development Server
In order to run the development server you need to run the following command:
```bash
php artisan serve
```

### Use The API
> Work in progress ...

