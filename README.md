# Test Task

A test project that provides currency and settings API endpoints. Built with Laravel 12 and Docker for quick setup and isolated development.

## Installation

### Clone the Repository

```bash
https://github.com/tea-aroma/test-task.git

cd test-task/
```

---

### Environment

Copy the example `.env` file:

```bash
cp .env.example .env
```

Update `.env` with your custom values.

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
docker compose exec app php artisan migrate db:seed --class=DatabaseSeeder 
```

---

## Configurations

Add the following to your `.env` file.

### Database

```dotenv
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=laravel
DB_PASSWORD=secret
```

### Cache & Queue (Redis)

```dotenv
CACHE_STORE=redis
QUEUE_CONNECTION=redis
```

### External API URL

```dotenv
CURRENCIES_URL=%YOUR_URL%
```

Now the project is available on `http://localhost:8000`. 

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
const httpRequest = await httpRequest.send({ url: 'currencies/list', method: 'get' });

console.log(httpRequest.getResponse()); // HttpResponse interface.
```

```js
const settingData = '{...}'; // JSON with required properties.

const httpRequest = await HttpRequest.send({
    url: 'settings/settings/update',
    method: 'post',
    data: settingData
});

console.log(httpRequest.getResponse()); // HttpResponse interface.
```
