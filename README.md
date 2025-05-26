# About

This is a simple note app built with PHP and MySQL, structured as an MVC framework inspired by Laravel. While the app’s core functionality is straightforward, the focus is on the project structure as a solid foundation for building a PHP MVC framework.

The architecture is 100% object-oriented, featuring a Router that directs each request to its dedicated controller and view. It supports all common HTTP methods (GET, POST, DELETE, PATCH, PUT) and includes middleware for authentication.

The project uses a hybrid routing system, blending MVC-style controllers with file-based route handlers, providing flexibility and scalability.

The entire app is fully dockerized, ensuring it can run consistently across any environment.

# Setup

    .env: Remember to add your .env file (not included for security reasons)

    Composer: make sure composer is installed locally. The vendor/ folder is ignored for version control. To install dependencies, run the following commands:

composer init                       # If composer.json doesn’t exist
composer install                    # To install dependencies and autoloading
composer require vlucas/phpdotenv   # For loading .env files
