# About

An MVC framework. This is a simple note app using PHP and MySQL. The idea is quite simple, but the structure of the project is what matters most. I created this note app as a base to build a PHP framework (MVC) on top of it. The project structure is quite similar to Laravel's.

This structure is 100% OOP, routed using a Router. Every request has its own controller and a corresponding view. It also supports all HTTP methods (GET and POST by default, and I also added support for DELETE, PATCH, and PUT). Middleware for authentication is also supported.

Besides that, it is fully Dockerized and can run anywhere.
# .env

Do not forget to add the .env file for the app to run. I could upload it, and that would be fine, but it's best to avoid that.
# Composer

You must have Composer installed locally. I ignored the vendor/ folder because it's not recommended to push large folders/files to version control. To install dependencies and get the app running, simply run:

~$ composer init                        # If you don't have composer.json
~$ composer install                     # For autoloading
~$ composer require vlucas/phpdotenv    # To load .env files
