<?php 
class vehicle {
  public $make;
  public $model;
  protected $wheels = 4;
  public $doors = 2;
  private $passengers;
  public $convertible = false;

  public function type(){
    return $this->make ." ". $this->model ." has ". $this->wheels . " wheels and " . $this->doors . " doors and will sit " . $this->passengers . " people and ". $this->isConvertible();
  }

  public function passengers(){
    return $this->passengers;
  }

  public function setPassengers($value){
    $this->passengers = floatval($value);
  }

  public function isConvertible(){
    $convertibleString = $this->convertible == true ? "is a convertible" :  "is not a convertible";
    return $convertibleString . ".";
  }
}

class car extends vehicle {
  public $doors = 4;
}

class truck extends vehicle {
}

class sportCar extends car {
  public $doors = 2;
}

class roadster extends sportCar {
  public $convertible = true;
}

$z3 = new roadster;
$z3->model = 'Z3';
$z3->make = 'BMW';
$z3->setPassengers(2);

$f150 = new truck;
$f150->model = 'F150';
$f150->make = 'Ford';
$f150->setPassengers(2);

$civic = new car;
$civic->model = 'Civic';
$civic->make ='Honda';
$civic->setPassengers(5);

$mustang = new sportCar;
$mustang->model = 'Ford';
$mustang->make = 'Mustang';
$mustang->setPassengers(4);

echo $z3->type() . "<br><br>";

echo $civic->type() . "<br><br>";

echo $f150->type() . "<br><br>";

echo $mustang->type() . "<br><br>";
?>