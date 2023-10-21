<?php 
class Bicycle {
  var $brand;
  var $model;
  var $year;
  var $description = "Used bicycle";
  var $weight_kg = 0.0;

  function name() {
    return $this ->brand . " ". $this -> model . " ". $this->weight_kg ."kg (" . $this -> year . ") " . $this->description . ".";
  }

  function weight_lbs() {
    return floatval($this -> weight_kg) * 2.2046226218;
  }

  function set_weight_lbs($value) {
    $this->weight_kg = floatval($value) / 2.2046226218;
  }

}

$trek = new Bicycle;
$trek->brand ='Trek';
$trek->model = 'Emonda';
$trek->year = '2017';
$trek->weight_kg = 1.0;

$cd = new Bicycle;
$cd->brand = 'Cannondale';
$cd->model = 'Synapse';
$cd->year = '2016';
$cd->weight_kg =8.0;


echo $trek->name() . "<br>";
echo $trek->weight_kg . " kg <br>";
echo $trek->weight_lbs() . " lbs <br><br>";

echo $cd->name() . "<br>";
echo $cd->weight_kg . " kg <br>";
echo $cd->weight_lbs() . " lbs <br>";
?>

