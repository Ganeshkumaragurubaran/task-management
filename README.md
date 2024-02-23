# Your Laravel Task Management App

This Laravel application is a task management system allowing users to create, view, update, and delete tasks.

## Prerequisites

Before you begin, ensure you have the following installed on your machine:

- [PHP](https://www.php.net/manual/en/install.php)
- [Composer](https://getcomposer.org/download/)
- [Node.js](https://nodejs.org/en/download/)
- [NPM](https://www.npmjs.com/get-npm)
- [MySQL](https://dev.mysql.com/downloads/mysql/)

## Setup Instructions

1. Clone the repository:

    ```bash
    git clone https://github.com/Ganeshkumaragurubaran/task-management.git
    ```

2. Navigate to the project directory:

    ```bash
    cd your-laravel-task-app
    ```

3. Install PHP dependencies:

    ```bash
    composer install
    ```

4. Install JavaScript dependencies:

    ```bash
    npm install
    ```

5. Copy the `.env.example` file to `.env`:

    ```bash
    cp .env.example .env
    ```

6. Generate an application key:

    ```bash
    php artisan key:generate
    ```

7. Configure your database in the `.env` file:

    ```env
    DB_CONNECTION=mysql
    DB_HOST=your-database-host
    DB_PORT=your-database-port
    DB_DATABASE=your-database-name
    DB_USERNAME=your-database-username
    DB_PASSWORD=your-database-password
    ```

8. Migrate and seed the database:

    ```bash
    php artisan migrate 
    ```

9. Start the development server:

    ```bash
    php artisan serve
    ```

10. Visit [http://localhost:8000](http://localhost:8000) in your browser.

## Usage

- Visit the application in your browser and create an account.
- Log in and start managing your tasks.

## Additional Information

- Laravel documentation: [https://laravel.com/docs](https://laravel.com/docs)
- Bootstrap documentation: [https://getbootstrap.com/docs](https://getbootstrap.com/docs)

Happy coding!
