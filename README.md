# Larashop

A modern e-commerce study project built with Laravel 12 and Vue 3, featuring a customer-facing storefront and an administrative dashboard.

## Overview

Larashop is an educational e-commerce platform designed to demonstrate best practices in full-stack web development. The project combines Laravel's robust backend capabilities with Vue 3's reactive frontend framework, providing a complete shopping experience with administrative tools.

## Tech Stack

### Backend

- **Laravel 12** - PHP framework for the application core and API
- **MySQL/PostgreSQL** - Database management

### Frontend

- **Vue 3** - Modern JavaScript framework for the customer-facing storefront
- **Blade Templates** - Server-side rendering for the admin panel
- **AdminLTE** - Admin dashboard UI theme
- **Vite** - Fast build tool and development server

### Development Environment

- **Docker** - Containerized development environment
- **Docker Compose** - Multi-container orchestration

## Installation

1. **Clone the repository**

    ```bash
    git clone <repository-url>
    cd larashop
    ```

2. **Copy environment file**

    ```bash
    cp .env.example .env
    ```

3. **Start Docker containers**

    ```bash
    docker-compose up -d
    ```

4. **Install PHP dependencies**

    ```bash
    docker-compose exec app composer install
    ```

5. **Install NPM dependencies**

    ```bash
    docker-compose exec app npm install
    ```

6. **Generate application key**

    ```bash
    docker-compose exec app php artisan key:generate
    ```

7. **Run database migrations**

    ```bash
    docker-compose exec app php artisan migrate
    ```

8. **Seed the database (optional)**

    ```bash
    docker-compose exec app php artisan db:seed
    ```

9. **Build frontend assets**
    ```bash
    docker-compose exec app npm run dev
    ```

## Contributing

This is a study project. Feel free to fork and experiment with the codebase.

## Acknowledgments

- Free HTML template by **graygrids**
- **AdminLTE** for the admin dashboard theme
