Ourhotels - Backend
===
OurHotels is a hotel search solution that look into many providers and display results from 
all the available hotels, for now we are aggregate from two providers: BestHotels and  TopHotel
 
## Requirements
The project is based on the version `6.x` of the Laravel framework, 
so make sure that you are satisfying the requirements
listed in the [framework's documentation](https://laravel.com/docs/6.x#server-requirements)

## Installation
Run the following commands in order to get a ready to use clone of the application:

1. Clone the repository 
```bash
git clone  https://github.com/AlShahawi/ourhotels-backend.git
```
2. Get into the directory 
```bash
cd ourhotels-backend
```
3. Check that your environment satisfy the requirements 
```bash
composer check-platform-reqs
```
4. Install composer dependencies 
```bash
composer install
```
5. Setup your envorinment 
```bash
cp .env.example .env
```
6. Generate app secret key 
```bash
php artisan key:generate
```

Now you have a ready to use clone of the application.

## How To?

### Running Automated Tests
> Note: The project is covered by Unit and Feature (API) tests.

Run the following command to run the tests:
```bash
./vendor/bin/phpunit
```

### Start The Development Server
In order to run the development server you need to run the following command:
```bash
php artisan serve
```

### Use The API

You can use the `OurHotels` service that aggregates hotels from multiple providers,
simply make a get request to the following endpoint:
```
http://localhost:8000/api/search?from_date=2020-01-25&to_date=2020-01-31&city=CAI&adults_number=4
```

