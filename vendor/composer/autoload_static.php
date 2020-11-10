<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit10e9e41218bd155b4c969f77d30961eb
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'SlevomatCodingStandard\\' => 23,
        ),
        'G' => 
        array (
            'Gineign\\GmoPayment\\' => 19,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'SlevomatCodingStandard\\' => 
        array (
            0 => __DIR__ . '/..' . '/slevomat/coding-standard/SlevomatCodingStandard',
        ),
        'Gineign\\GmoPayment\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $prefixesPsr0 = array (
        'S' => 
        array (
            'Suin\\Sniffs\\Classes\\' => 
            array (
                0 => __DIR__ . '/..' . '/suin/phpcs-psr4-sniff/src',
            ),
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit10e9e41218bd155b4c969f77d30961eb::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit10e9e41218bd155b4c969f77d30961eb::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit10e9e41218bd155b4c969f77d30961eb::$prefixesPsr0;
            $loader->classMap = ComposerStaticInit10e9e41218bd155b4c969f77d30961eb::$classMap;

        }, null, ClassLoader::class);
    }
}
