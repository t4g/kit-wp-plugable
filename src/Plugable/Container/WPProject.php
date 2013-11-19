<?php
/**
 * Created by PhpStorm.
 * User: soap
 * Date: 18/11/2013
 * Time: 06:00
 */

namespace Kit\WP\Plugable\Container;


class WPProject extends Kit\WP\Plugable\Container\Generic{


    public static $_properties_allowed = array(
        'name'             =>  NULL,
        'description'      =>  NULL,
        'version'          =>  NULL,
        'min_version'      =>  NULL,
        'must_be_active'   =>  TRUE,
        'project_homepage' =>  NULL,
    );


} 