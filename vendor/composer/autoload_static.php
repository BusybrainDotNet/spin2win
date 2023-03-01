<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit73dc5149356d98c7074aea24d67d31fb
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Config\\' => 7,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Config\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Config',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/App/Mails',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit73dc5149356d98c7074aea24d67d31fb::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit73dc5149356d98c7074aea24d67d31fb::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit73dc5149356d98c7074aea24d67d31fb::$classMap;

        }, null, ClassLoader::class);
    }
}
