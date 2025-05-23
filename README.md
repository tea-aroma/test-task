# Test Task

A test project that provides currency and settings API endpoints. Built with Laravel 12 and Docker for quick setup and isolated development.

## Installation

### Clone the Repository

```bash
git clone https://github.com/tea-aroma/test-task.git
```

```bash
cd test-task/
```

---

### Environment

Copy the example `.env` file:

```bash
cp .env.example .env
```

Update `.env` with your custom values.

#### Database

```dotenv
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=laravel
DB_PASSWORD=secret
```

#### Cache & Queue (Redis)

```dotenv
QUEUE_CONNECTION=redis

CACHE_STORE=redis

REDIS_HOST=laravel_redis
```

#### External API URL

```dotenv
CURRENCIES_URL=%YOUR_URL%
```

---

### Docker

Build and start the containers:

```bash
docker compose up -d --build
```

Notice: Make sure Docker and Docker Compose are installed and running on your system.

---

### Laravel

Install dependencies:

```bash
docker compose exec app composer install
```

Generate the application key:

```bash
docker compose exec app php artisan key:generate
```

Run migrations:

```bash
docker compose exec app php artisan migrate
```

Run seeder:

```bash
docker compose exec app php artisan db:seed --class=DatabaseSeeder 
```

Now the project should be available at: http://localhost:8000

---

## System Settings

### Available variables

| Key                          | Value        | Description                                 |
|------------------------------|--------------|---------------------------------------------|
| `widget-autoupdate-interval` | `5000`       | Widget auto-update interval (milliseconds). |
| `cron-autoupdate-interval`   | `0 * * * *`  | Cron auto-update interval (CRON format).    |
| `cache-timeout`              | `3600`       | Cache timeout duration (in seconds).        |
| `currencies-url`             | *(from env)* | API endpoint for currencies.                |
| `widget-columns`             | `5`          | Number of columns shown in the widget.      |

---

## API

### Available routes

| URL                             | Description                  |
|---------------------------------|------------------------------|
| `/currencies/list`              | All currencies.              |
| `/currencies/record`            | One record of currencies.    |
| `/settings/settings/list`       | List of system settings.     |
| `/settings/settings/get/{code}` | One setting by its `code`.   |
| `/settings/settings/update`     | Updates a setting.           |
| `/settings/currencies/list`     | List of currencies settings. |
| `/settings/currencies/update`   | Updates a currency setting.  |

### Examples

```js
const httpRequest = await HttpRequest.send({ url: 'api/currencies/list', method: 'get' });

console.log(httpRequest.getResponse()); // HttpResponse interface.
```

```js
const settingData = '{...}'; // JSON with required properties.

const httpRequest = await HttpRequest.send({
	url: 'api/settings/settings/update',
	method: 'post',
	data: settingData
});

console.log(httpRequest.getResponse()); // HttpResponse interface.
```
