# Laravel 5.5+ Front-end Preset For Tabler Dashboard UI Kit

[![Latest Stable Version](https://poser.pugx.org/cesaramirez/laravel-tabler/v/stable)](https://packagist.org/packages/cesaramirez/laravel-tabler)

Preset for [Tabler](https://tabler.github.io/) scaffolding on a new Laravel 5.5 or above project.

## Usage

1.  Fresh install Laravel 5.5 or above and `cd` to your app.
2.  Install this preset via `composer require cesaramirez/laravel-tabler`. Laravel 5.5+ will automatically discover this package. No need to register the service provider.
3.  Use `php artisan preset tabler` for basic Tabler preset. **OR** Use `php artisan preset tabler-auth` for basic preset, Auth route entry and Tabler Auth views in one go. (**NOTE**: If you run this command several times, be sure to clean up the duplicate Auth entries in `routes/web.php`)
4.  `yarn`
5.  `yarn dev` or `yarn watch`
6.  Configure your favorite database (mysql, sqlite, etc.)
7.  `php artisan migrate` to create basic user tables.
8.  `php artisan serve` (or equivalent) to run server and test preset.