<?php

class Admin extends DatabaseObject {

  static protected $tableName = "admins";
  static protected $dbColumns = ['id', 'firstName', 'lastName', 'email', 'username', 'hashedPassword'];

  public $id;
  public $firstName;
  public $lastName;
  public $email;
  public $username;
  protected $hashedPassword;
  public $password;
  public $confirmPassword;
  protected $passwordRequired = true;

  public function __construct($args = []) 
  {
    $this->firstName = $args['firstName'] ?? '';
    $this->lastName = $args['lastName'] ?? '';
    $this->email = $args['email'] ?? '';
    $this->username = $args['username'] ?? '';
    $this->password = $args['password'] ?? '';
    $this->confirmPassword = $args['confirmPassword'] ?? '';
  }

  public function fullName() {
    return $this->firstName . " " . $this->lastName;
  }

  protected function setHashedPassword() {
    $this->hashedPassword = password_hash($this->password, PASSWORD_BCRYPT);
  }

  public function verifyPassword($password) {
    return password_verify($password, $this->hashedPassword);
  }

  protected function create() {
    $this->setHashedPassword();
    return parent::create();
  }

  protected function update() {
    if($this->password != '') {
      $this->setHashedPassword();
      // validate password
    } else {
      // password not being updated, skip hashing and validation
      $this->passwordRequired = false;
    }
    return parent::update();
  }

  protected function validate() {
    $this->errors = [];

    if(isBlank($this->firstName)) {
      $this->errors[] = "First name cannot be blank.";
    } elseif (!hasLength($this->firstName, array('min' => 2, 'max' => 255))) {
      $this->errors[] = "First name must be between 2 and 255 characters.";
    }

    if(isBlank($this->lastName)) {
      $this->errors[] = "Last name cannot be blank.";
    } elseif (!hasLength($this->lastName, array('min' => 2, 'max' => 255))) {
      $this->errors[] = "Last name must be between 2 and 255 characters.";
    }

    if(isBlank($this->email)) {
      $this->errors[] = "Email cannot be blank.";
    } elseif (!hasLength($this->email, array('max' => 255))) {
      $this->errors[] = "Last name must be less than 255 characters.";
    } elseif (!hasValidEmailFormat($this->email)) {
      $this->errors[] = "Email must be a valid format.";
    }

    if(isBlank($this->username)) {
      $this->errors[] = "Username cannot be blank.";
    } elseif (!hasLength($this->username, array('min' => 8, 'max' => 255))) {
      $this->errors[] = "Username must be between 8 and 255 characters.";
    } elseif (!hasUniqueUsername($this->username, $this->id ?? 0)) {
      $this->errors[] = "Username not allowed. Try another.";
    }

    if($this->passwordRequired) {
      if(isBlank($this->password)) {
        $this->errors[] = "Password cannot be blank.";
      } elseif (!hasLength($this->password, array('min' => 12))) {
        $this->errors[] = "Password must contain 12 or more characters";
      } elseif (!preg_match('/[A-Z]/', $this->password)) {
        $this->errors[] = "Password must contain at least 1 uppercase letter";
      } elseif (!preg_match('/[a-z]/', $this->password)) {
        $this->errors[] = "Password must contain at least 1 lowercase letter";
      } elseif (!preg_match('/[0-9]/', $this->password)) {
        $this->errors[] = "Password must contain at least 1 number";
      } elseif (!preg_match('/[^A-Za-z0-9\s]/', $this->password)) {
        $this->errors[] = "Password must contain at least 1 symbol";
      }

      if(isBlank($this->confirmPassword)) {
        $this->errors[] = "Confirm password cannot be blank.";
      } elseif ($this->password !== $this->confirmPassword) {
        $this->errors[] = "Password and confirm password must match.";
      }
    }

    return $this->errors;
  }

  static public function find_by_username($username) {
    $sql = "SELECT * FROM " . static::$tableName . " ";
    $sql .= "WHERE username='" . self::$database->escape_string($username) . "'";
    $obj_array = static::findBySql($sql);
    if(!empty($obj_array)) {
      return array_shift($obj_array);
    } else {
      return false;
    }
  }
}