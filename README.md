# Encoding App

## Requirements
- [Git](https://git-scm.com/)
- [Docker & Docker Compose](https://www.docker.com/)
- [PHP 8.1+](https://www.php.net/)
- [Composer](https://getcomposer.org/)
- [Node.js & npm](https://nodejs.org/)

---

## Setup Guide

### 1. Clone the repository
```bash
git clone <repo-url>
cd encoder_app
```

### 2. Start Docker containers
```bash
docker compose up -d
```
This will start the MySQL database and Adminer. MySQL data will be saved locally in `data/mysql/`.

### 3. Install PHP dependencies
```bash
cd src
composer install
```

### 4. Setup environment file
```bash
cp .env.example .env
php artisan key:generate
```

### 5. Run database migrations and seeders
```bash
php artisan migrate --seed
```

### 6. Install Node dependencies and build assets
```bash
npm install
npm run build
```

### 7. Start the development server
```bash
php artisan serve
```

The app will be available at **http://localhost:8000**

---

## Other URLs
| Service  | URL                        |
|----------|----------------------------|
| App      | http://localhost:8000      |
| Adminer  | http://localhost:8080      |

---

## Useful Commands
```bash
# Stop Docker containers
docker compose down

# Re-run migrations (fresh)
php artisan migrate:fresh --seed

# Watch assets during development
npm run dev
```
