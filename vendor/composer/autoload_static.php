<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit241d4369535d76fc9e68ff2a86605fc8
{
    public static $prefixLengthsPsr4 = array (
        'H' => 
        array (
            'Http\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Http\\' => 
        array (
            0 => __DIR__ . '/../..' . '/http',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit241d4369535d76fc9e68ff2a86605fc8::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit241d4369535d76fc9e68ff2a86605fc8::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit241d4369535d76fc9e68ff2a86605fc8::$classMap;

        }, null, ClassLoader::class);
    }
}
