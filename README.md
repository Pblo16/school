# Laravel Application Setup

<p align="center">
    <a href="https://laravel.com" target="_blank">
        <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
    </a>
</p>

## About This Project

This Laravel application comes with a custom command to simplify the setup process. By running a single command, you can generate the application key, run database migrations, and seed the database with test data.

## Installation

### Prerequisites
Make sure you have the following installed:
- PHP 8.x
- Composer
- MySQL or another supported database
- Node.js & npm (if using frontend assets)
- Laravel Sail (optional, for Docker-based setup)

### Setup Instructions
1. **Clone the repository:**
   ```sh
   git clone <repository-url>
   cd <project-folder>
   ```

2. **Install dependencies:**
   ```sh
   composer install
   ```

3. **Copy the environment file:**
   ```sh
   cp .env.example .env
   ```

4. **Run the setup command:**
   ```sh
   php artisan app:start
   ```
   This command will:
   - Generate the application key
   - Run fresh database migrations
   - Seed the database with test data

5. **Start the application:**
   ```sh
   php artisan serve
   ```

## Default User Credentials
After running `php artisan app:start`, you can log in with the following test credentials:

- **Email:** `test@example.com`
- **Password:** `password`

## License
This project is open-sourced under the [MIT license](https://opensource.org/licenses/MIT).

## Contributing
Contributions are welcome! Please follow the [Laravel contribution guide](https://laravel.com/docs/contributions) if you wish to contribute to this project.

## Security Vulnerabilities
If you discover a security vulnerability, please report it responsibly by emailing the maintainer.

---

Now you're all set to start building with Laravel! 🚀

