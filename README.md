![Logo](https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg)

## Installation

-   Make sure you have composer installed on your computer, you can check using this command
    -   `composer -V` or `composer --version`
-   Make sure you are using PHP v8.0 or latest
-   For windows I suggest to install <a href="https://git-scm.com/">Git SCM</a>
-   for Mac or Linux
    -   Select directory for this project
    -   Then following this command in your terminal
        -   `git clone https://github.com/setiawannuha/vending-machine`
        -   `cd vending-machine`
        -   `composer install`
-   for Windows
    -   Open your git SCM
    -   Select directory for this project
    -   Then following this command on your Git Bash
        -   `git clone https://github.com/setiawannuha/vending-machine`
        -   `cd vending-machine`
        -   `composer install`
-   copy .env.example file to .env
-   fill the .env file using your database credential
    -   `DB_CONNECTION=mysql`
    -   `DB_HOST=YOURDBHOST`
    -   `DB_PORT=3306`
    -   `DB_DATABASE=YOURDBNAME`
    -   `DB_USERNAME=YOURDBUSERNAME`
    -   `DB_PASSWORD=YOURDBPASSWORD`
    -   `APP_TOKEN=YOURSTATICTOKEN`
-   migrate the databse
    -   `php artisan migrate`
-   seed table
    -   `php artisan db:seed`
-   run project
    -   `php artisan serve`

## Documentation
