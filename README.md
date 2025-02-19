# Laravel Project with Sail, Docker, and Laravel Breeze

## Prerequisites

-   Docker & Docker Compose
-   Laravel Sail

## Installation

1. **Clone the repository**

    ```sh
    git clone <your-repository-url>
    cd <your-project-directory>
    ```

2. **Copy the environment file**

    ```sh
    cp .env.example .env
    ```

3. **Start the Docker container using Sail**

    ```sh
    ./vendor/bin/sail up -d
    ```

4. **Install dependencies**

    ```sh
    ./vendor/bin/sail composer install
    ```

5. **Generate application key**

    ```sh
    ./vendor/bin/sail artisan key:generate
    ```

6. **Run migrations**

    ```sh
    ./vendor/bin/sail artisan migrate
    ```

7. **Install Laravel Breeze** (for authentication scaffolding)
    ```sh
    ./vendor/bin/sail composer require laravel/breeze --dev
    ./vendor/bin/sail artisan breeze:install
    ./vendor/bin/sail npm install && ./vendor/bin/sail npm run dev
    ```

## API Routes

| Method | Route              | Controller                       | Middleware     |
| ------ | ------------------ | -------------------------------- | -------------- |
| POST   | `/register`        | `RegisteredUserController@store` | None           |
| POST   | `/login`           | `LoginController@store`          | None           |
| POST   | `/logout`          | `LogoutController@store`         | `auth:sanctum` |
| GET    | `/me`              | `MeController@show`              | `auth:sanctum` |
| GET    | `/sets`            | `SetController@index`            | `auth:sanctum` |
| GET    | `/sets/{id}`       | `SetController@show`             | `auth:sanctum` |
| GET    | `/sets/{id}/cards` | `SetController@getCards`         | `auth:sanctum` |

## Running the Project

To start the application, run:

```sh
./vendor/bin/sail up -d
```

## Stopping the Project

To stop the Docker containers, run:

```sh
./vendor/bin/sail down
```
