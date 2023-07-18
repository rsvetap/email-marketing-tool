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

Copy the `.env.example` file to `.env` and modify the necessary configuration options (such as database and mail smtp settings).

```
cp .env.example .env
```

```
DB_CONNECTION=pgsql
DB_HOST=localhost
DB_PORT=5432
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=

MAIL_MAILER=smtp
MAIL_HOST=
MAIL_PORT=
MAIL_USERNAME=
MAIL_PASSWORD=
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=
MAIL_FROM_NAME="${APP_NAME}"
```

Generate your application encryption key using `php artisan key:generate`

Run  `php artisan migrate` and `php artisan db:seed` to create all necessary tables and fill them in with seed data

## Admin Panel

To access the admin panel, go to `localhost/admin/login` on the server.
Admin: `login:test@test.test`, `password:12345678`
