<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit348b61a4fa3d94829988c24dc710135d
{
    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInit348b61a4fa3d94829988c24dc710135d::$classMap;

        }, null, ClassLoader::class);
    }
}
