<?php

namespace Recipes\Controller;
use Recipes\Model\User;
use Recipes\Model\Comment;
use Recipes\Integration\DBH;

/**
 * Description of Controller
 *
 * @author Coyote
 */
class Controller {
    
    
    var $dbh;
    var $user;
    
    public function __construct() {
        $this->dbh = new DBH();
        $this->user = null;
    }
    
    public static function getController() {
        if (isset($_SESSION['controller'])) {
            return unserialize($_SESSION['controller']);
        } else {
            return new Controller();
        }
    }
    
    public function shutdown() {
        $_SESSION['controller'] = serialize($this);
    }
    
    public function getComments(string $pageName){
        $comments = $this->dbh->getComments($pageName);
        return $comments;
    }
    
    public function addComment(string $commenttext, string $pageName){
        $author = $this->user->getName();
        $comment = new Comment($pageName, $author, $commenttext);
        $this->dbh->addComment($comment);
    }
    
    public function deleteComment(string $timestamp, string $page){
        $this->dbh->deleteComment($timestamp, $this->user, $page);
    }
    
    public function isLoggedIn(){
        if(isset($this->user)){
            return true;
        } else {
            return false;
        }
    }
    
    public function login(string $acc, string $pass){
        $user = new User($acc, $pass);
        $valid = $this->dbh->isValid($user);
        if($valid){
            $this->user = $user;
        }
        return $valid;
    }
    
    public function logout() {
        $this->user = null;
    }
    
    public function signup(string $acc, string $pass){
        $user = new User($acc, $pass);
        $succeded = $this->dbh->registerUser($user);
        return $succeded;
    }
    
    public function getUser() {
        return $this->user->getName();
    }
}
