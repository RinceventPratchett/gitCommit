<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit7cf91e36efe68bfebd6df2f61ba263c1
{
    public static $classMap = array (
        'Ps_CustomerSignIn' => __DIR__ . '/../..' . '/ps_customersignin.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInit7cf91e36efe68bfebd6df2f61ba263c1::$classMap;

        }, null, ClassLoader::class);
    }
}