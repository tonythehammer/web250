<?php

class Session {

  private $userId;
  public $username;
  private $lastLogin;
  private $userLevel;

  public const MAX_LOGIN_AGE = 60*60*24;

  public function __construct() {
    session_start();
    $this->checkStoredLogin();
  }

  public function login($user){
    if($user){
      session_regenerate_id();
      $this->userId = $_SESSION['userId'] = $user->id;
      $this->userLevel = $_SESSION['userLevel'] = $user->userLevel;
      $this->username = $_SESSION['username'] = $user->username;
      $this->lastLogin = $_SESSION['lastLogin'] = time();
    }
    return true;
  }

  public function isLoggedIn (){
    return isset($this->userId) && $this->lastLoginIsRecent();
  }

  public function userLevel() {
    $user = $this->userLevel;
    return $user;
  }

  public function logout() {
    unset($_SESSION['userId']);
    unset($_SESSION['username']);
    unset($_SESSION['lastLogin']);
    unset($this->userId);
    unset($this->username);
    unset($this->lastLogin);
    return true;
  }

  private function checkStoredLogin() {
    if(isset($_SESSION['userId'])) {
      $this->userId = $_SESSION['userId'];
      $this->userLevel = $_SESSION['userLevel'];
      $this->username = $_SESSION['username'];
      $this->lastLogin = $_SESSION['lastLogin'];
    }
  }

  private function lastLoginIsRecent() {
    if(!isset($this->lastLogin)) {
      return false;
    } elseif(($this->lastLogin + self::MAX_LOGIN_AGE) < time()) {
      return false;
    } else {
      return true;
    }
  }

  public function message($msg="") {
    if(!empty($msg)) {
      $_SESSION['message'] = $msg;
      return true;
    } else {
      return $_SESSION['message'] ?? '';
    }
  }

  public function clearMessage() {
    unset($_SESSION['message']);
  }

}
