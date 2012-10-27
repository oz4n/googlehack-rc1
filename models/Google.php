<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Google
 *
 * @author ozan rock
 */
class Google extends CFormModel {

    public $key;  
    public $cat;
   

    public function attributeLabels() {

        return array(
            'key' => '',
            'cat' => ''           
        );
    }   
    

}
