<?php
/**
 * Created by PhpStorm.
 * User: soap
 * Date: 18/11/2013
 * Time: 06:00
 */

namespace Kit\WP\Plugable\Dependency;


class Dependency {


    protected static $knowntypes = array(
        'plugins' => array(),
        'themes' => array()
    );

    private $dependencies;




    /**
     * Plugin constructor
     */
    function __constructor($dependency = null){

       if ($dependency === null)

           $this->$dependencies = self::$knowntypes;

       else {
           $this->_loadRecursive($dependency);
       }
       return $this->$dependencies;
    }



    function _loadRecursive($dependency){
        $dependency = array_intersect($dependency, self::$knowntypes);
        foreach(self::$knowntypes as $type){
            if(isset($dependency[$type])) $this->$type = $dependency[$type];
        }
    }



    function _load($type,$data){
        $dependency = array_intersect($dependency, self::$knowntypes);
        if(isset(self::$knowntypes[$type])){
            $this->$type = $data;
            return TRUE;
        }
        return FALSE;
    }


    /**
     * Add a dependancy
     * @param $dependancy
     */
    function __set($a, $b){

        if( isset(self::$knowntypes[$a]) ){
            if(is_string($b))
                $this->dependencies[$a][] = new Kit\WP\Plugable\Container\WPProject(array('name' => $b));
            elseif (is_array($b))
                foreach( $b as $c)
                    if(is_string($c))
                        $this->$a = $c;
                    elseif( is_array($c) )
                        $this->dependencies[$a][] = new Kit\WP\Plugable\Container\WPProject($c);
            return TRUE;
        }

        return FALSE;


    }


    /**
     * Get dependencies
     */
    public function __get($name){
        if( isset(self::$knowntypes[$a]) ){
            return $this->dependencies[$a];
        }
        else throw new \Exception();
    }


} 