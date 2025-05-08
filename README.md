# 📚 Laravel Books API

A simple RESTful API for managing a list of books built with Laravel 10 and SQLite.

---

## 🚀 Features

-   Create, read, update, and delete books
-   Form Request validation
-   API responses in JSON
-   PHPUnit feature tests
-   Seeder support for test data

---

## ⚙️ Setup Instructions

### 1. Clone the Repository

```bash
git clone https://github.com/your-username/laravel_books_api.git
cd laravel_books_api
```

### 2. Install Dependencies

```bash
composer install
```

### 3. Set Up Environment File

```bash
cp .env.example .env
```

### 4. Generate Application Key

```bash
php artisan key:generate
```

### 5. Run Migrations and Seed Data

```bash
php artisan migrate:fresh --seed
```

### 5. Start the Development Server

```bash
php artisan serve
```

### 6. Start the Development Server

```bash
php artisan test

```

Tests include:

Successful creation, update, listing, and deletion of books

Validation checks for required fields and valid data

JSON response structure

| Method | Endpoint        | Description    |
| ------ | --------------- | -------------- |
| GET    | /api/books      | List all books |
| GET    | /api/books/{id} | Get one book   |
| POST   | /api/books      | Create a book  |
| PUT    | /api/books/{id} | Update a book  |
| DELETE | /api/books/{id} | Delete a book  |

🧪 Testing
Run feature and unit tests using PHPUnit:

bash
Copy
Edit
php artisan test
Tests include:

Successful creation, update, listing, and deletion of books

Validation checks for required fields and valid data

JSON response structure
