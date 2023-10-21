<?php 

function urlFor($scriptPath) {
  if($scriptPath[0] != '/'){
    $scriptPath = "/" . $scriptPath;
  }
  return WWW_ROOT . $scriptPath;
}

function u($string=""){
  return urlencode($string);
}

function rawU($string="") {
  return rawurlencode($string);
}

function h($string=""){
  return htmlspecialchars($string);
}

function error404() {
  header($_SERVER["SERVER_PROTOCOL"] . "404 Not Found");
}

function error500() {
  header($_SERVER["SERVER_PROTOCOL"] . "500 Internal Server Error");
}

function redirectTo($location) {
  header("Location: " . $location);
  exit;
}

function isPostRequest() {
  return $_SERVER['REQUEST_METHOD'] == 'POST';
}

function isGetRequest(){
  return $_SERVER['REQUEST_METHOD'] == 'GET';
}

if(!function_exists('moneyFormat')) {
  function moneyFormat($format,$number){
    return '$'. number_format($number, 2);
  }
}

?>