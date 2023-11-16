<?php

class Session {

  private $adminId;
  public $username;
  private $lastLogin;

  public const MAX_LOGIN_AGE = 60*60*24;

  public function login($admin){
    if($admin){
      session_regenerate_id();
      $this->adminId = $_SESSION['admin_id'] = $admin->id;
      $this->username = $_SESSION['username'] = $admin->username;
      $this->lastLogin = $_SESSION['last_login'] = time();
    }
    return true;
  }

  public function isLoggedIn (){
    return isset($this->adminId) && $this->lastLoginIsRecent();
  }

  public function logout() {
    unset($_SESSION['adminId']);
    unset($_SESSION['username']);
    unset($_SESSION['lastLogin']);
    unset($this->adminId);
    unset($this->username);
    unset($this->lastLogin);
    return true;
  }

  private function checkStoredLogin() {
    if(isset($_SESSION['adminId'])) {
      $this->adminId = $_SESSION['adminId'];
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
