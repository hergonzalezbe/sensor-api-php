# Sensor API in PHP
A simple and efficient REST API built with pure PHP to store and retrieve sensor readings, following best practices for security, maintainability, and scalability.

## Features
- Store sensor data (temperature, humidity, etc.).
- Retrieve stored readings via API endpoints.
- Secure database interactions using PDO and prepared statements.
- Lightweight and efficient, ideal for small to medium-sized IoT applications.

## Installation
- Clone the repository
git clone https://github.com/hergonzalezbe/sensor-api-php.git
cd sensor-api-php

## Import the database
- Open MySQL and run the script in database.sql.
- Configure database connection
- Copy config.example.php to config.php and update the database credentials.

## Start the API
- Deploy the API on a local or remote PHP server (Apache, Nginx, etc.).

## API Endpoints

| Method | Endpoint | Description |
|--------|---------|-------------|
| `GET`  | `/sensors` | Active sensors list |
| `POST` | `/sensors` | Add a sensor (`name`, `location`, `type`) |
| `GET`  | `/sensors/{id}` | Get sensor details by ID |
| `PUT`  | `/sensors/{id}` | Update sensor information |
| `DELETE` | `/sensors/{id}` | Delete a sensor |
| `POST` | `/data` | Log a reading (`sensor_id`, `value`, `timestamp`) |
| `GET`  | `/data` | Get all sensor readings |
| `GET`  | `/data/{sensor_id}` | Get a reading from a specific sensor |
| `GET`  | `/data/report` | Get a data summary per sensor (averages, maximums, minimums) |


## Example Request (POST - JSON)

```json
{
  "sensor_id": 1,
  "temperature": 22.5,
  "humidity": 60.0
}
````

## Example config.php (database configuration)
```php
<?php
return [
    'DB_HOST' => 'your host/localhost',
    'DB_NAME' => 'your database name',
    'DB_USER' => 'your user',
    'DB_PASS' => 'your database password',
];


