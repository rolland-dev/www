<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit520887b049a467f81c405b8d9b5d7ed0
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit520887b049a467f81c405b8d9b5d7ed0::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit520887b049a467f81c405b8d9b5d7ed0::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit520887b049a467f81c405b8d9b5d7ed0::$classMap;

        }, null, ClassLoader::class);
    }
}
