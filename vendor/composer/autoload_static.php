<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit048db103f07c4e977b2e65dc1752e2d6
{
    public static $files = array (
        '253c157292f75eb38082b5acb06f3f01' => __DIR__ . '/..' . '/nikic/fast-route/src/functions.php',
    );

    public static $prefixLengthsPsr4 = array (
        'F' => 
        array (
            'FastRoute\\' => 10,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'FastRoute\\' => 
        array (
            0 => __DIR__ . '/..' . '/nikic/fast-route/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit048db103f07c4e977b2e65dc1752e2d6::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit048db103f07c4e977b2e65dc1752e2d6::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit048db103f07c4e977b2e65dc1752e2d6::$classMap;

        }, null, ClassLoader::class);
    }
}
