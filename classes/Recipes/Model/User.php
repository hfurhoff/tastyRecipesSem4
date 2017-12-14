<?php

namespace Recipes\Model;

/**
 * Description of User
 *
 * @author Coyote
 */
class User {
    
    var $acc;
    var $pass;
    
    public function __construct(string $acc, string $pass) {
        $this->acc = $acc;
        $this->pass = $pass;
    }
    
    public function getName(){
        return $this->acc;
    }
    
    public function getPass(){
        return $this->pass;
    }
}
