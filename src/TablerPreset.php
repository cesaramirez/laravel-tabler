<?php

namespace cesaramirez\Presets\Tabler;

use Illuminate\Foundation\Console\Presets\Preset;
use Illuminate\Support\Arr;

class TablerPreset extends Preset
{
    /**
     * Install the preset and auth views.
     */
    public static function installAuth()
    {
        static::install();
        static::scaffoldAuth();
    }

    /**
     * Update the given package array.
     *
     * @param array $packages
     *
     * @return array
     */
    protected static function updatePackageArray(array $packages)
    {
        return [
            'bootstrap' => '^4.0.0',
            'popper.js' => '^1.12.9',
        ] + Arr::except($packages, ['bootstrap-sass']);
    }

    /**
     * Update the Sass files for the application.
     */
    protected static function updateSass()
    {
        copy(__DIR__.'/tabler-stubs/sass/app.scss', resource_path('assets/sass/app.scss'));
        copy(__DIR__.'/tabler-stubs/sass/_variables.scss', resource_path('assets/sass/_variables.scss'));
        copy(__DIR__.'/tabler-stubs/sass/tabler', resource_path('assets/sass/'));
    }

    /**
     * Update the bootstrapping files.
     */
    protected static function updateBootstrapping()
    {
        copy(__DIR__.'/tabler-stubs/webpack.mix.js', base_path('webpack.mix.js'));
        copy(__DIR__.'/tabler-stubs/bootstrap.js', resource_path('assets/js/bootstrap.js'));
    }

    /**
     * Export the authentication views.
     *
     * @return void
     */
    protected static function scaffoldAuth()
    {
        file_put_contents(app_path('Http/Controllers/HomeController.php'), static::compileControllerStub());
        file_put_contents(
            base_path('routes/web.php'),
            "\nAuth::routes();\n\nRoute::get('/home', 'HomeController@index')->name('home');\n\n",
            FILE_APPEND
        );
        (new Filesystem())->copyDirectory(__DIR__.'/tabler-stubs/views', resource_path('views'));
    }

    /**
     * Compiles the HomeController stub.
     *
     * @return string
     */
    protected static function compileControllerStub()
    {
        return str_replace(
            '{{namespace}}',
            Container::getInstance()->getNamespace(),
            file_get_contents(__DIR__.'/tabler-stubs/controllers/HomeController.stub')
        );
    }
}
