<?php

namespace Basalt\Providers;

use PDO;

class DatabaseServiceProvider extends ServiceProvider
{
    public function provide()
    {
        $this->app->container->pdo = function($container) {
            $config = $container->app->config['database'];

            $dsn = sprintf('mysql:host=%s;dbname=%s', $config['host'], $config['dbname']);

            $pdo = new PDO($dsn, $config['user'], $config['password'], [
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
            ]);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $pdo;
        };
    }
}