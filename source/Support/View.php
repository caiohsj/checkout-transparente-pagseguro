<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Source\Support;

use \Rain\Tpl;

class View extends Tpl
{
    public function __construct() {
        $config = array(
                     "tpl_dir"       => "themes/",
                     "cache_dir"     => "themes/cache/"
        );
        Tpl::configure( $config );
    }
    
    /*
     * @param array $data contém dados que serão enviados ao template
     * 
     * @return void
     */
    public function assignData(array $data)
    {
        foreach ($data as $key => $value) {
            $this->assign($key, $value);
        }
    }
}