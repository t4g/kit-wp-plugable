<?php
/**
 * Created by PhpStorm.
 * User: soap
 * Date: 06/12/2013
 * Time: 01:32
 */

namespace Kit\WP\Plugable;


interface Plugable {


    const PluginName = __CLASS__;


    const Version = "1.00";


    const PluginAuthor = "__SOMEBODY__";


    public function loading();


}