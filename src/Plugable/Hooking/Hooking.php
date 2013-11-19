<?php
/**
 * Basic Singleton abstracted.
 * User: soap
 * Date: 18/11/2013
 * Time: 06:00
 */



namespace Kit\Singleton;


class Singleton {

    /**
     * Contains the singleton
     * @var null
     */
    protected static $_instance = null;


    /**
     * Static factory
     * @param $action
     * @param $actionable
     * @return Singleton|null
     */
    public function &_(){
        if(self::$_instance === null) self::$_instance = new self;
        return self::$_instance;
    }



} 