<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitc3c46a13d66edde9d0cd947139b93257
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInitc3c46a13d66edde9d0cd947139b93257', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitc3c46a13d66edde9d0cd947139b93257', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitc3c46a13d66edde9d0cd947139b93257::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
