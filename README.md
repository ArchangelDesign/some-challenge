Some Challenge for 1 afternoon

![](/Screenshot_2024-09-09_181805.png)

# Installation:

### start application locally
### Requires PHP 8.2
```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan serve
```

### Run Migrations
Make sure the DB config is correct
```bash
php artisan migrate
```

### API Routes
```
GET /api/products
GET /api/cart
POST /api/cart?id=<product id>
```
### Web Routes
```
GET /
```

## DB Structure
### Products
- `id` Unique product ID
- `name` 120 character string
- `price` Integer representing the number of cents (no need for floating point operations)

