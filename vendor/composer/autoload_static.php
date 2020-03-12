<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit353a7e2b240817f58500210cccac7d35
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'System\\' => 7,
        ),
        'D' => 
        array (
            'DB\\' => 3,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'System\\' => 
        array (
            0 => __DIR__ . '/../..' . '/System',
        ),
        'DB\\' => 
        array (
            0 => __DIR__ . '/../..' . '/System',
        ),
    );

    public static $fallbackDirsPsr4 = array (
        0 => __DIR__ . '/../..' . '/Models',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit353a7e2b240817f58500210cccac7d35::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit353a7e2b240817f58500210cccac7d35::$prefixDirsPsr4;
            $loader->fallbackDirsPsr4 = ComposerStaticInit353a7e2b240817f58500210cccac7d35::$fallbackDirsPsr4;

        }, null, ClassLoader::class);
    }
}
