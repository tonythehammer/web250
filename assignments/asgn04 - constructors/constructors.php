<?php

class Bird
{
  public $commonName;
  public $latinName;

  public function __construct($args = [])
  {
    $this->commonName = $args['commonName'] ?? null;
    $this->latinName = $args['latinName'] ?? null;
  }
}

$robin = new Bird([
  'commonName' => "American Robin",
  'latinName' => "Turbus Migratorius"
]);

echo "Common name: " .$robin->commonName . "<br>";
echo "Latin name: " .$robin->latinName . "<br><br>";

$towhee = new Bird([
  'commonName' => "Eastern Towhee",
  'latinName' => "Pipilo Erythrophthalmus"
]);

echo "Common name: " . $towhee->commonName . "<br>";
echo "Latin name: " . $towhee->latinName . "<br>";
