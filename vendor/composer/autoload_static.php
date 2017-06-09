<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd9364dacb3f6874fa00a47062f4c4d33
{
    public static $files = array (
        '0e6d7bf4a5811bfa5cf40c5ccd6fae6a' => __DIR__ . '/..' . '/symfony/polyfill-mbstring/bootstrap.php',
        '667aeda72477189d0494fecd327c3641' => __DIR__ . '/..' . '/symfony/var-dumper/Resources/functions/dump.php',
        '0e423a14e27410a071e5d815d3ffc856' => __DIR__ . '/..' . '/larapack/dd/src/helper.php',
    );

    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Symfony\\Polyfill\\Mbstring\\' => 26,
            'Symfony\\Component\\VarDumper\\' => 28,
            'Schnapsen\\' => 10,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Symfony\\Polyfill\\Mbstring\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-mbstring',
        ),
        'Symfony\\Component\\VarDumper\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/var-dumper',
        ),
        'Schnapsen\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/Schnapsen',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitd9364dacb3f6874fa00a47062f4c4d33::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd9364dacb3f6874fa00a47062f4c4d33::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}