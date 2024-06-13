
# Laravel Seeder Generator

[![Latest Stable Version](https://poser.pugx.org/airondev/laravel-seeder-generator/v/stable)](https://packagist.org/packages/airondev/laravel-seeder-generator)
[![Total Downloads](https://poser.pugx.org/airondev/laravel-seeder-generator/downloads)](https://packagist.org/packages/airondev/laravel-seeder-generator)
[![License](https://poser.pugx.org/airondev/laravel-seeder-generator/license)](https://packagist.org/packages/airondev/laravel-seeder-generator)

Laravel Seeder Generator is a package that automatically generates seeders for each table in your database. It simplifies the process of creating seeders, allowing you to focus on other important tasks in your Laravel application.

## Installation

You can install the package via Composer:

```bash
composer require airondev/laravel-seeder-generator
```

### Step 1: Register the Service Provider

If you are using Laravel 5.5 or later, the package will be auto-discovered. For earlier versions of Laravel, add the service provider to the `providers` array in `config/app.php`:

```php
'providers' => [
    // Other Service Providers

    Airondev\SeederGenerator\SeederGeneratorServiceProvider::class,
],
```

## Usage

### Generate Seeders

To generate seeders for each table in your database, run the following command:

```bash
php artisan make:seeders
```

This command will create a seeder file for each table in the `database/seeders` directory.

### Customize Stub File (Optional)

If you want to customize the seeder stub file, you can publish it to your application and make your changes:

```bash
php artisan vendor:publish --tag=stubs
```

The stub file will be published to the `stubs` directory in the root of your application. You can edit it to fit your needs.

## Example

After running the `php artisan make:seeders` command, you will see seeder files generated in the `database/seeders` directory:

```php
<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            // Your data here
        ]);
    }
}
```

## Contributing

Thank you for considering contributing to the Laravel Seeder Generator package! You can submit issues and pull requests to the [GitHub repository](https://github.com/airondev/laravel-seeder-generator).

## License

This package is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
```

