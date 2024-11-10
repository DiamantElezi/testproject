# Employee Management API

This is a simple REST API for managing employees, allowing for batch import of employee data from CSV files and supporting basic CRUD operations. The project is built with Laravel and uses MySQL/MariaDB for data storage.

## Prerequisites

- PHP 8.0+
- Composer
- MySQL/MariaDB
- [DDEV](https://ddev.readthedocs.io/en/stable/) (optional, can use other development environments)

## Project Setup

### Step 1: Clone the Repository
```bash
git clone https://github.com/DiamantElezi/testproject
cd testproject

if you use ddev 
ddev config (
projectname - 
Docroot Location - leave default to public
Project type - laravel)

ddev get ddev/ddev-phpmyadmin 
ddev start 
```
### Step 2: Install Dependencies
```bash
composer install
```
### Step 3: Configure Environment Variables

Copy the .env.example to .env and configure the following environment variables:

Note this db configurations use only if you use ddev if not you can add it as the other development enviorment needs

```bash
APP_URL = testproject.ddev.site  // or if you added other name write as the url u need

DB_CONNECTION="mysql"
DB_HOST="db"
DB_PORT="3306"
DB_DATABASE="db"
DB_USERNAME="db"
DB_PASSWORD="db"
```
### Step 4: Set Up the Database
```bash
php artisan migrate
```

## API Endpoints
### Import Employees (CSV)

Endpoint: POST /api/employee

Description: Imports employee data from a CSV file.

Accepts: A CSV file as a raw binary in the request body or as an uploaded file (file).

### Import Employees (CSV)

Endpoint: GET /api/employee

Description: Retrieves a list of all employees.

Response: JSON array of employee records.

```bash

{
  "data": [
    {
      "employee_id": "123",
      "user_name": "jdoe",
      "first_name": "John",
      "last_name": "Doe",
      ...
    },
    ...
  ]
}
```

Endpoint: POST /api/employee/{id}

Description: Retrieves a single employee by their id.

Response: JSON object of the employee’s details.
```bash

{
  "data": {
    "employee_id": "123",
    "user_name": "jdoe",
    "first_name": "John",
    "last_name": "Doe",
    ...
  }
}
```

Delete Employee

Endpoint: DELETE /api/employee/{id}

Description: Deletes an employee by their id.

Response: JSON message confirming deletion.


## Additional Notes

Environment Compatibility: Although DDEV is recommended, any local environment with PHP, MySQL, and Composer installed should work.

Temporary Files: The application stores temporary CSV files during import, which are deleted after processing.



