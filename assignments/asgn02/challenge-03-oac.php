<?php

use Bicycle as GlobalBicycle;

class Bicycle {

public static $instanceCount = 0;

  public $brand;
  public $model;
  public $year;
  public $category;
  public $description = "Used bicycle";
  private $weightKg = 0.0;
  protected static $wheels = 2;

  public const CATEGORIES = ['Road', 'Mountain', 'Hybrid', 'Cruiser', 'City', 'BMX'];

  public static function create(){
    $className = get_called_class();
    $obj = new $className;
    self::$instanceCount++;
    return $obj;
  }

  public function name() {
    return $this ->brand . " ". $this -> model  ." (" . $this -> year . ") " . $this->description . ".";
  }

  public function weightKg() {
    return $this->weightKg;
  }

  public function setWeightKg($value){
    $this->weightKg = floatval($value);
  }

  public function weightLbs() {
    return floatval($this -> weightKg) * 2.2046226218;
  }

  public function setWeightLbs($value) {
    $this->weightKg = floatval($value) / 2.2046226218;
  }

  public static function wheelDetails() {
    $wheelsString = static::$wheels == 1 ? "1 wheel" : static::$wheels . " wheels";
    return "It has " . $wheelsString . ".";
  }

}

class Unicycle extends GlobalBicycle {
  protected static $wheels = 1;
}

$trek = new Bicycle;
$trek->brand ='Trek';
$trek->model = 'Emonda';
$trek->year = '2017';

$cd = new Bicycle;
$cd->brand = 'Cannondale';
$cd->model = 'Synapse';
$cd->year = '2016';

$uni = new Unicycle;
$uni->brand = 'Nimbus';
$uni->model = 'Hatchet';
$uni->year ='2020';


echo $trek->name() . "<br>";
$trek->setWeightKg(1);
echo $trek->weightKg() . " kg <br>";
echo $trek->weightLbs() . " lbs <br><br>";

echo $cd->name() . "<br>";
$cd->setWeightKg(8);
echo $cd->weightKg() . " kg <br>";
echo $cd->weightLbs() . " lbs <br><br>";

echo $uni->name() . "<br>";
$uni->setWeightKg(5);
echo $uni->weightKg() . " kg <br>";
echo $uni->weightLbs() . " lbs <br>";
?>