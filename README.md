# Order Note Board

PHP/Laravel application for creating and managing notes against order numbers.

## Features
* Create notes against an order number
* View all existing notes
* Delete notes
* Notes are stored in a SQLite database
* Notes update without refreshing the page

## Tech Stack
* PHP
* Laravel
* SQLite
* HTML
* CSS
* JavaScript

## Setup
Install dependencies:

```bash
composer install
```

Run the database migrations:

```bash
php artisan migrate
```

Start the application:

```bash
php artisan serve
```

Open:

```text
http://127.0.0.1:8000/notes
```

## API Endpoints

```http
GET /api/notes
POST /api/notes
DELETE /api/notes/{id}
```

## Notes

The brief mentioned using Vue.js as an optional bonus. i did some initial exploring but ultimately decided to stick to using just plain HTML, CSS and JavaScript to ensure
i created a working solution in the suggested time frame

If i had more time, I would:

* Refactor the frontend into Vue components
* Add note editing functionality
* Improve validation and user feedback
* Add automated tests