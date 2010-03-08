<?php

class Mockery_Framework
{
    public static function autoload($class)
    {
        if (substr($class, 0, 8) !== 'Mockery_' && $class !== 'Mockery') {
            return false;
        }
        $path = dirname(dirname(__FILE__));
        include $path . '/' . str_replace('_', '/', $class) . '.php';
    }

}

spl_autoload_register(array('Mockery_Framework', 'autoload'));

function mockery($className, $custom = null, $constructorArgs = null)
{
    return Mockery::mock($className, $custom, $constructorArgs);
}

function mockery_verify()
{
    return Mockery::verify();
}
