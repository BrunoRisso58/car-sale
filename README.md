# Car Trader API

Car Trader API is a web application built using [Lumen Framework](https://lumen.laravel.com/) that provides an API to retrieve information about cars being sold in different cities. The API is composed of three microservices: Cars, Brands, and Cities, and an API Gateway.

The Cars microservice allows you to get a list of all cars, create a new car, get one specific car, update or delete an existing car. To create a new car, you need to provide the brand and city id, model, and year.

The Brands microservice provides a list of all brands, creates a new brand, gets one specific brand, updates or deletes an existing brand. To create a new brand, you need to provide a name.

The Cities microservice provides a list of all cities, creates a new city, gets one specific city, updates or deletes an existing city. To create a new city, you need to provide the name and the state.

The API Gateway is the entry point for all requests to the API. It provides a unified interface for clients to access the different microservices.

To use the Car Trader API, you can send HTTP requests to the API Gateway. The API supports filtering by brand and city. You can retrieve a list of all cars or filter by brand and/or city.

Car Trader API uses SQLite as its database. When creating a new car, the system checks whether the brand and city already exist in the database. If not, you need to create the brand or city before creating the car.

Overall, Car Trader API provides a simple and efficient way to retrieve information about cars being sold in different cities.

# Run Project

Please make sure you have installed at least:
- PHP 7.3
- Composer 2.4.4

In order to run the project you must follow these steps:
1. Open LumenBrandsApi folder on terminal and run "composer install"
2. Run "php artisan migrate"
3. Copy the content of .env.example file and paste on .env file
4. Run "php -S localhost:8000 -t ./public"
5. Open LumenCitiesApi folder on another terminal and run "composer install"
6. Run "php artisan migrate"
7. Copy the content of .env.example file and paste on .env file
8. Run "php -S localhost:8001 -t ./public"
9. Open LumenCarsApi folder on another terminal and run "composer install"
10. Run "php artisan migrate"
11. Copy the content of .env.example file and paste on .env file
12. Run "php -S localhost:8002 -t ./public"
13. Open LumenApiGateway folder on another terminal and run "composer install"
14. Run "php artisan migrate"
15. Copy the content of .env.example file and paste on .env file
16. Run "php -S localhost:8003 -t ./public"

Requests must be made to the Api Gateway instead of the microservice itself.

## Authentication

This is necessary because you'll get an "Unauthorized" exception if you do not follow that. Please follow the steps below to make sure you are authenticated. On LumenApiGateway:
1. Run "php artisan passport:install"
2. Copy the Client ID and the Client secret
3. Make a post request on "localhost:8003/register" passing in the request body the name, email, password and password_confirmation attributes of the user you want to create
4. Make a post request on "localhost:8003/oauth/token" passing in the request body the following model (edit the data between {{}} to the corresponding information):
```
{
    "grant_type": "password",
    "client_id": {{Client ID}},
    "client_secret": "{{Client secret}}",
    "password": "{{created password}}",
    "username": "create user email",
    "scope": ""
}
```
5. From now on, every request you made to an endpoint on Api Gateway you need to pass a header with the key Authorization and the value equal to the code the endpoint from step 4 returned to you

That way you will be authenticated
