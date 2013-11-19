<?php
/**
 * Created by PhpStorm.
 * User: soap
 * Date: 18/11/2013
 * Time: 06:00
 */

namespace Kit\WP\Plugable\Container;


interface GenericContainer {

    //   public $_properties_allowed;

}





class Generic {


    public static $_properties_allowed = array(
        'name'             =>  NULL,
    );

    private $_properties                = array();


    public function __construct($array=null){
        if(is_array($array))
            $this->_loadarray($array);
        elseif(is_string($array))
            $this->_properties[name];
    }


    private function _loadarray($array){
        $array = array_intersect_key($array, self::$_properties_allowed);
        if(  is_array($array) &&
             isset($array['name']) &&
             count($array) > 0)
        {
            $this->_properties = $array;
        }
    }



    public function __isset($name){
        if
        (
             isset($this->_properties[$name]) &&
             $this->_properties[$name] !== NULL
        )    return TRUE;

        return FALSE;
    }


    public function __set($a, $b){
       if(isset(self::$_properties_allowed[$a])) $this->_properties = $b;
    }


    public function __get($n){
        if(isset($this->_properties[$n]))
            return $this->_properties[$n];
        return FALSE;
    }

    public function __toString(){
        return json_encode($this->_properties);
    }

} 