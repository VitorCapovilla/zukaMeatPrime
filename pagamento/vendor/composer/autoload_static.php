<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd17940159dc60240e9b3b562eb57ee7e
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Psr\\Log\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Psr\\Log\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/log/Psr/Log',
        ),
    );

    public static $prefixesPsr0 = array (
        'C' => 
        array (
            'Cielo' => 
            array (
                0 => __DIR__ . '/..' . '/developercielo/api-3.0-php/src',
            ),
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitd17940159dc60240e9b3b562eb57ee7e::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd17940159dc60240e9b3b562eb57ee7e::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInitd17940159dc60240e9b3b562eb57ee7e::$prefixesPsr0;
            $loader->classMap = ComposerStaticInitd17940159dc60240e9b3b562eb57ee7e::$classMap;

        }, null, ClassLoader::class);
    }
}