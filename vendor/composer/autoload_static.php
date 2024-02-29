<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc98a1738d124eb96d6c3d89995055829
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/App',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitc98a1738d124eb96d6c3d89995055829::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc98a1738d124eb96d6c3d89995055829::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitc98a1738d124eb96d6c3d89995055829::$classMap;

        }, null, ClassLoader::class);
    }
}
