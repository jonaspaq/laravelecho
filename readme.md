# Laravel Echo
Laravel Echo is an application where users can message each other.

## Installation
Clone this repository.
```
git clone https://github.com/jonaspaq/laravelecho.git
```

Install composer dependencies in root directory of this project:
```
composer install -n --prefer-dist
```

Install npm dependencies in root directory of this project:
```
npm install
```

Copy .env:
```
cp .env.example .env
```

Generate app key:
```
php artisan key:generate
```

Modify .env file to your preferred configuration:
> Note: Configuration may vary. You may use PostgreSQL or MySQL or depends on what you like.


Run migration:
```
php artisan migrate
```

## Usage
To serve the project:
```
php artisan serve
```

Open http://localhost:8000 in your browser.

## Tools Used 
- [Laravel](https://laravel.com/)
- [jQuery](https://jquery.com/)
- [Bootstrap 4](https://getbootstrap.com/)


## Asset compilation

### Development
```
npm run development
```
or
```
npm run watch
```
### Production
```
npm run production
```
