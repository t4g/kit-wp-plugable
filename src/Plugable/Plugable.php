<?php
/**
 * Created by PhpStorm.
 * User: soap
 * Date: 18/11/2013
 * Time: 06:00
 */

namespace Kit\WP\Plugable;


class Plugable {


    /**
     * Plugin version
     * @var string
     */
    public $_VERSION = "1.000";


    /**
     * Plugin schema version
     * @var string
     */
    public $_SCHEMAVERSION = 1000;



    /**
     * Plugin schema version
     * @var string
     */
    public $_DEPENDENCY = null;



    /**
     * Generic default plugin details
     * @var array
     */
    private $_info = array(
        'name'    =>'__PLUGINNAME__',
        'author'  =>'__PLUGINAUTHOR__',
        'contact' =>'__PLUGINCONTACT__',
    );


    /**
     * Plugin constructor
     */
    function __constructor($message)
    {
       $this->$_DEPENDENCY = new Dependency\Dependency();
    }


    /**
     * Add a dependancy
     * @param $dependancy
     */
    function addDependancy($dependancy)
    {

        if(is_array($dependancy))
            $this->_DEPENDENCY->_loadRecursive($dependancy);
        else
            $this->_DEPENDENCY->_load($dependancy);

        return $this->_DEPENDENCY;
    }


    /**
     * Get all dependancies
     * Optionally type type.
     * @param $type
     * @return Dependency\Dependency
     */
    function getDependancy($type=null)
    {
        if($this->_DEPENDENCY === NULL)
            $this->_DEPENDENCY = Dependency\Dependency::$knowntypes;

        if($type === NULL)
            return $this->_DEPENDENCY;

        if(isset($this->_DEPENDENCY[$type]))
            return $this->_DEPENDENCY[$type];

        return FALSE;
    }

} 