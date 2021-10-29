<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitba28d11610b503b8721db343b5253738
{
    public static $prefixLengthsPsr4 = array (
        'D' => 
        array (
            'David\\Bienesraices\\' => 19,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'David\\Bienesraices\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInitba28d11610b503b8721db343b5253738::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitba28d11610b503b8721db343b5253738::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitba28d11610b503b8721db343b5253738::$classMap;

        }, null, ClassLoader::class);
    }
}
