<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit48d29cacc2cebb2cb2e1c282434a1456
{
    public static $prefixLengthsPsr4 = array (
        'K' => 
        array (
            'Kamranhasani\\Settarehpay\\' => 25,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Kamranhasani\\Settarehpay\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit48d29cacc2cebb2cb2e1c282434a1456::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit48d29cacc2cebb2cb2e1c282434a1456::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit48d29cacc2cebb2cb2e1c282434a1456::$classMap;

        }, null, ClassLoader::class);
    }
}
