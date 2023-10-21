<?php

function myAutoload($class)
{
  if(preg_match('/\A\w+\Z/', $class)) {
    include 'classes/' . $class . '.class.php';
  }
}
spl_autoload_register('myAutoload');

$flyCatcher = new Bird([
  'commonName' => 'Acadian Flycatcher',
  'latinName' => 'Empidonax Virescens'
]);

echo $flyCatcher->commonName . "<br>";
echo $flyCatcher->latinName . "<br>";

$towhee = new Bird([
  'commonName' => "Eastern Towhee",
  'latinName' => "Pipilo Erythrophthalmus"
]);

echo "<hr>";
echo $towhee->commonName . "<br>";
echo $towhee->latinName . "<br>";