# Email Marketing Tool

The project represent the example of Email Marketing Tool

## Table of Contents

- [Getting Started](#getting-started)
- [Admin Panel](#admin-panel)

## Getting Started

To install the project, you can follow these steps:

Clone the project repository from GitHub:

```
git clone https://github.com/rsvetap/email-marketing-tool.git
```
You can navigate to the email-marketing-tool folder by using the cd command. Here's how you can do it:

```
cd email-marketing-tool
```

Install project dependencies using Composer:

```
composer install
```

Install project dependencies using npm:

```
npm install
```


To start application run:

```
doker compose up
```

To get inside app container run:

```
docker compose exec app bash
```

## Generating PHP helpers

- type hints, container: `php artisan ide-helper:generate && php artisan ide-helper:meta`
- models: `php artisan ide-helper:models -RW`



## Preparing app:

Inside app container run  `php artisan migrate` and `php artisan db:seed` to create all necessary tables and fill them in with seed data

## Admin Panel

To access the admin panel, go to [http://marketing-tool.localtest.me/admin/login](http://marketing-tool.localtest.me/admin/login) on the server.
Credentials:
 - **login:** `test@test.test`
 - **password:** `12345678`
