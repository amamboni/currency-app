# Currency App

### Requirements

-   Composer [https://getcomposer.org](https://getcomposer.org/)
-   PHP [https://www.php.net/downloads.php](https://www.php.net/downloads.php)
-   Node/NPM [https://nodejs.org/en/download](https://nodejs.org/en/download/)

### Installation

1. Install PHP Packages `composer install`
1. Install Node/JavaScript packages `npm install`
1. Build frontend assets `npm run build`
1. Serve the application on the PHP development server `php artisan serve`

### Web App

You can access the web app in `http://localhost:8000` after executing the serve command

### Command Line

You can also run this command to the terminal to convert currency from command line:
`php artisan convert-currency`

For example:

```
php artisan convert-currency
```

Output:

```
Convert from which currency?:
 > usd

Convert to which currency?:
 > php

What is the amount?:
 > 10

563.4103132
```

### External API

This project uses the Exchange Rate API from [https://github.com/fawazahmed0/exchange-api](https://github.com/fawazahmed0/exchange-api)
