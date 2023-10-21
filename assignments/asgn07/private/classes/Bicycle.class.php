<?php 

class Bicycle {
  static protected $database;

  static public function setDatabase($database) {
    self::$database = $database;
  }

  static public function findBySql($sql) {
    $result = self::$database->query($sql);
    if(!$result) {
      exit("Database query failed.");
    }
    
    $objectArray =[];
    while($record = $result->fetch_assoc()){
      $objectArray[] = self:: instantiate($record);
    }

    $result->free();

    return $objectArray;
  }

  static public function findAll() {
    $sql = "SELECT * FROM bicycles";
    return self::findBySql($sql);
  }

  static public function findById($id){
    $sql = "SELECT * FROM bicycles ";
    $sql .= "WHERE id='" . self::$database->escape_string($id) . "'";
    $objArray = self::findBySql($sql);
    if(!empty($objArray)) {
      return array_shift($objArray);
    } else {
      return false;
    }
  }

  static protected function instantiate($record) {
    $object = new self;
    foreach($record as $property => $value) {
      if(property_exists($object, $property)){
        $object->$property = $value;
      }
    }
    return $object;
  }

  public $id;
  public $brand;
  public $model;
  public $year;
  public $category;
  public $color;
  public $description;
  public $gender;
  public $price;
  protected $weightKg;
  protected $conditionId;

  public const CATEGORIES = ['Road', 'Mountain', 'Hybrid', 'Cruiser', 'City', 'BMX'];

  public const GENDERS = ['Mens', 'Womens', 'Unisex'];

  public const CONDITION_OPTIONS = [
    1 => 'Beat up',
    2 => 'Decent',
    3 => 'Good',
    4 => 'Great',
    5 => 'Like New'
  ];

  public function __construct($args=[]){
    $this->brand = $args['brand'] ?? '';
    $this->model = $args['model'] ?? '';
    $this->year = $args['year'] ?? '';
    $this->category = $args['category'] ?? '';
    $this->color = $arg['color'] ?? '';
    $this->description = $args['description'] ?? '';
    $this->gender = $args['gender'] ?? '';
    $this->price = $args['price'] ?? 0;
    $this->weightKg = $args['weightKg'] ?? 0.0;
    $this->conditionId = $args['conditionId'] ?? 3;
  }

  public function name() {
    return "{$this->brand} {$this->model} {$this->year}";
  }
  public function weightKg() {
    return number_format($this->weightKg, 2) . ' kg';
  }

  public function setWeightKg($value) {
    $this->weightKg = floatval($value);
  }

  public function weightLbs() {
    $weightLbs = floatval($this->weightKg) * 2.2046226218;
    return number_format($weightLbs, 2) . ' lbs';
  }

  public function setWeightLbs($value) {
    $this->weightKg = floatval($value) / 2.2046226218;
  }


  public function condition() {
    if($this->conditionId > 0){
      return self::CONDITION_OPTIONS[$this->conditionId];
    } else {
      return "Unknown";
    }
  }

}

?>
