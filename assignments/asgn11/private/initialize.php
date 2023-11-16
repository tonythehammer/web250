<?php

  ob_start(); 

  define("PRIVATE_PATH", dirname(__FILE__));
  define("PROJECT_PATH", dirname(PRIVATE_PATH));
  define("PUBLIC_PATH", PROJECT_PATH . '/public');
  define("SHARED_PATH", PRIVATE_PATH . '/shared');

  $publicEnd = strpos($_SERVER['SCRIPT_NAME'], '/public') + 7;
  $docRoot = substr($_SERVER['SCRIPT_NAME'], 0, $publicEnd);
  define("WWW_ROOT", $docRoot);

  require_once('functions.php');
  require_once('statusErrorFunctions.php');
  require_once('dbCredentials.php');
  require_once('databaseFunctions.php');
  require_once('validationFunctions.php');

  foreach(glob('classes/*.class.php') as $file) {
    require_once($file);
  }

  function my_autoload($class) {
    if(preg_match('/\A\w+\Z/', $class)) {
      include('classes/' . $class . '.class.php');
    }
  }
  spl_autoload_register('my_autoload');

  $database = dbConnect();
  DatabaseObject::setDatabase($database);

  $session = new Session;

?>
