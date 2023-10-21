<?php
  ob_start(); // turn on output buffering

  // session_start(); // turn on sessions if needed

  define("PRIVATE_PATH", dirname(__FILE__));
  define("PROJECT_PATH", dirname(PRIVATE_PATH));
  define("PUBLIC_PATH", PROJECT_PATH . '/public');
  define("SHARED_PATH", PRIVATE_PATH . '/shared');

  $publicEnd = strpos($_SERVER['SCRIPT_NAME'], '/public') + 7;
  $docRoot = substr($_SERVER['SCRIPT_NAME'], 0, $publicEnd);
  define("WWW_ROOT", $docRoot);
 
  require_once('functions.php');
  require_once('dbCredentials.php');
  require_once('databaseFunctions.php');
  //require_once('classes/bird.class.php');

  // Autoload class definitions
  function myAutoload($class) {
    if(preg_match('/\A\w+\Z/', $class)) {
      include('classes/' . $class . '.class.php');
    }
  }
  spl_autoload_register('myAutoload');

  $database = dbConnect();
  Bird::setDatabase($database);

?>
