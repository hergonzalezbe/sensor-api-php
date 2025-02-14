Sensor API in PHP
A simple and efficient REST API built with pure PHP to store and retrieve sensor readings, following best practices for security, maintainability, and scalability.

Features
- Store sensor data (temperature, humidity, etc.).
- Retrieve stored readings via API endpoints.
- Secure database interactions using PDO and prepared statements.
- Lightweight and efficient, ideal for small to medium-sized IoT applications.

Installation
- Clone the repository
git clone https://github.com/your-username/sensor-api-php.git
cd sensor-api-php

Import the database
- Open MySQL and run the script in database.sql.
- Configure database connection
- Copy config.example.php to config.php and update the database credentials.

Start the API
- Deploy the API on a local or remote PHP server (Apache, Nginx, etc.).

API Endpoints

| Method | Endpoint         | Description               |
|--------|----------------|---------------------------|
| `GET`  | `/api/readings` | Get all sensor readings  |
| `POST` | `/api/readings` | Add a new sensor reading |


Example Request (POST - JSON)
{
  "sensor_id": 1,
  "temperature": 22.5,
  "humidity": 60.0
}



