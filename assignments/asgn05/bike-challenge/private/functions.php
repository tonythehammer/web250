<?php 

function urlFor($script_path){
  if($script_path[0] != '/'){
    $script_path = "/" . $script_path;
  }
  return WWW_ROOT . $script_path;
}

function u($string = ""){
  return urlencode($string);
}

function rawU($string = ""){
  return rawurlencode($string);
}

function h($string = ""){
  return htmlspecialchars($string);
}

function error_404(){
  header($_SERVER["SERVER_PROTOCOL"]. "404 Not found");
  exit();
}

function error_500(){
  header($_SERVER["SERVER_PROTOCOL"] . "500 Internal server error");
  exit();
}

function redirectTo($location){
  header("location: " . $location);
  exit();
}

function isPostRequest(){
  return $_SERVER['REQUEST_METHOD'] == 'POST';
}

function isGetRequest(){
  return $_SERVER['REQUEST_METHOD'] == 'GET';
}

?>
