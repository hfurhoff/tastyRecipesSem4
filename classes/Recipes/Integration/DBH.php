<?php

namespace Recipes\Integration;
use Recipes\Model\Comment;
use Recipes\Model\User;
use mysqli;

/**
 * Description of DBH
 *
 * @author Coyote
 */
class DBH {
    
    public function getComments(string $pageName){
        $con = $this->connect();
        $sql = $con->prepare("SELECT user, commenttext, dateAndTime, timestamp FROM comment WHERE page= ? AND deleted=0");
        $sql->bind_param('s', $pageName);
        $sql->bind_result($user, $commenttext, $dateAndTime, $timestamp);
        $sql->execute();
        $comments = array();
        $i = 0;
        while($sql->fetch()) {
            $comments[$i] = new Comment($pageName, $user, $commenttext);
            $comments[$i]->setDateAndTimestamp($dateAndTime, $timestamp);
            $i++;
        }
        if ($i == 0) {
            unset($comments);
        }
        
        $this->close($sql, $con);
        return $comments;
    }
    
    public function addComment(Comment $comment){
        $con = $this->connect();
        $timestamp = $con->real_escape_string($comment->getTimestamp());
        $page = $con->real_escape_string($comment->getPageName());
        $author = $con->real_escape_string($comment->getAuthor());
        $commenttext = $con->real_escape_string($comment->getCommenttext());
        $dateandtime = $con->real_escape_string($comment->getDateAndTime());
        $sql = $con->prepare("INSERT INTO comment VALUES (?, 0, ?, ?, ?, ?)");
        $sql->bind_param('sssss', $timestamp, $page, $author, $commenttext, $dateandtime);
        $sql->execute();
        $this->close($sql, $con);
    }
    
    public function deleteComment(string $timestamp, User $user, string $page){
        $con = $this->connect();
        $acc = $con->real_escape_string($user->getName());
        $sql = $con->prepare("UPDATE comment SET deleted=1 WHERE timestamp='" . $timestamp 
                . "' AND page='". $page ."' AND user=?");
        $sql->bind_param('s', $acc);
        $sql->execute();
        $this->close($sql, $con);
    }
    
    public function isValid(User $user) {
        $con = $this->connect();
        $name = $con->real_escape_string($user->getName());
        $sql = $con->prepare("SELECT pass FROM user WHERE acc=?");
        $sql->bind_param('s', $name);
        $sql->bind_result($resultPass);
        $sql->execute();
        if ($sql->fetch()) {
            $valid = password_verify($user->getPass(), $resultPass);
            $this->close($sql, $con);
            return $valid;
        } else {
            $this->close($sql, $con);
            return false;
        }
    }
    
    public function registerUser(User $user){
        $con = $this->connect();
        $selectsql = $con->prepare("SELECT acc FROM user WHERE acc=?");
        $username = $con->real_escape_string($user->getName());
        $selectsql->bind_param('s', $username);
        $selectsql->bind_result($result);
        $selectsql->execute();
        if ($selectsql->fetch()) {
            $this->close($selectsql, $con);
            return false;
        } else {
            $password = password_hash($user->getPass(), PASSWORD_DEFAULT);
            $password = $con->real_escape_string($password);
            $insertsql = $con->prepare("INSERT INTO user (acc, pass) VALUES (?, ?)");
            $insertsql->bind_param('ss', $username, $password);
            $insertsql->execute();
            $this->close($insertsql, $con);
            return true;
        }
    }
    
    private function connect() {
        include 'D:/Skolarbeten/AppForInternet/dbDetailssem4.php';
        return new mysqli($servername, $username, $password, $dbname);
    }
    
    private function close($sql, $con) {
        $sql->close();
        $con->close();
    }
}
