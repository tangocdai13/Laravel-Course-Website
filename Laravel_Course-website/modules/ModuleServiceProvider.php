<?php

namespace Modules;

use Illuminate\Support\Facades\File;
use Illuminate\Support\ServiceProvider;
use Modules\User\src\Commands\TestCommand;
use Modules\User\src\Http\Middlewares\DemoMiddleware;
use Modules\User\src\Repositories\UserRepository;

class ModuleServiceProvider extends ServiceProvider
{
    private $middlewares = [
        'demo' => DemoMiddleware::class,
    ];

    private $commands = [
        TestCommand::class,
    ];

    public function boot()
    {
        $modules = $this->getModules();

        if (! empty($modules)) {
            foreach ($modules as $module) {
                $this->registerModule($module);
            }
        }
    }

    public function register()
    {
        //Config
        $modules = $this->getModules();
        if (! empty($modules)) {
            foreach ($modules as $module) {
                $this->registerConfig($module);
            }
        }

        //Middleware
        $this->registerMiddlewares();

        //Commands
        $this->commands($this->commands);

        //Repository
        $this->app->singleton(
            UserRepository::class
        );
    }

    private function getModules()
    {
        $directories = array_map('basename', File::directories(__DIR__));

        return $directories;
    }

    private function registerModule($module)
    {
        $modulePath = __DIR__."/{$module}";

        //Khai báo Route
        if (File::exists($modulePath.'/routes/routes.php')) {
            $this->loadRoutesFrom($modulePath.'/routes/routes.php');
        }

        //Khai báo Migration
        if (File::exists($modulePath.'/migrations')) {
            $this->loadMigrationsFrom($modulePath.'/migrations');
        }

        //Khai báo Language
        if (File::exists($modulePath.'/resources/lang')) {
            $this->loadTranslationsFrom($modulePath.'/resources/lang', strtolower($module));

            $this->loadJsonTranslationsFrom($modulePath.'/resources/lang');
        }

        //Khai báo View
        if (File::exists($modulePath.'/resources/views')) {
            $this->loadViewsFrom($modulePath.'/resources/views', strtolower($module));
        }

        //Khai báo Helper
        if (File::exists($modulePath.'/helpers')) {
            $helperList = File::allFiles($modulePath.'/helpers');

            if (! empty($helperList)) {
                foreach ($helperList as $helper) {
                    $file = $helper->getPathname();
                    require $file;
                }
            }
        }

    }

    //register config
    private function registerConfig($module)
    {
        $configPath = __DIR__.'/'.$module.'/configs';
        if (File::exists($configPath)) {
            $configFile = array_map('basename', File::allFiles($configPath));

            foreach ($configFile as $config) {
                $alias = basename($config, '.php');

                $this->mergeConfigFrom($configPath.'/'.$config, $alias);
            }
        }
    }

    //register middleware
    private function registerMiddlewares()
    {
        if (! empty($this->middlewares)) {
            foreach ($this->middlewares as $key => $middleware) {
                $this->app['router']->pushMiddlewareToGroup($key, $middleware);
            }
        }
    }
}
