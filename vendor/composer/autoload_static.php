<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitbc36caf2f41b2bb68381b44634e5591e
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitbc36caf2f41b2bb68381b44634e5591e::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitbc36caf2f41b2bb68381b44634e5591e::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitbc36caf2f41b2bb68381b44634e5591e::$classMap;

        }, null, ClassLoader::class);
    }
}