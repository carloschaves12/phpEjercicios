<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit17f89dff189e0fba51f6502c459c0460
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
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit17f89dff189e0fba51f6502c459c0460::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit17f89dff189e0fba51f6502c459c0460::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit17f89dff189e0fba51f6502c459c0460::$classMap;

        }, null, ClassLoader::class);
    }
}
