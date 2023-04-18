# Car Trader API

Car Trader API is a web application built using [Lumen Framework](https://lumen.laravel.com/) that provides an API to retrieve information about cars being sold in different cities. The API is composed of three microservices: Cars, Brands, and Cities, and an API Gateway.

The Cars microservice allows you to get a list of all cars, create a new car, get one specific car, update or delete an existing car. To create a new car, you need to provide the brand and city id, model, and year.

The Brands microservice provides a list of all brands, creates a new brand, gets one specific brand, updates or deletes an existing brand. To create a new brand, you need to provide a name.

The Cities microservice provides a list of all cities, creates a new city, gets one specific city, updates or deletes an existing city. To create a new city, you need to provide the name and the state.

The API Gateway is the entry point for all requests to the API. It provides a unified interface for clients to access the different microservices.

To use the Car Trader API, you can send HTTP requests to the API Gateway. The API supports filtering by brand and city. You can retrieve a list of all cars or filter by brand and/or city.

Car Trader API uses SQLite as its database. When creating a new car, the system checks whether the brand and city already exist in the database. If not, you need to create the brand or city before creating the car.

Overall, Car Trader API provides a simple and efficient way to retrieve information about cars being sold in different cities.
