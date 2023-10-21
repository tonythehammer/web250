<?php

class Bird {
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
    $sql = "SELECT * FROM birds";
    return self::findBySql($sql);
  }

  static public function findById($id){
    $sql = "SELECT * FROM birds ";
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
  public $commonName;
  public $habitat;
  public $food;
  public $nestPlacement;
  public $behavior;
  public $conservationId;
  public $backyardTips;
 

  protected const CONSERVATION_OPTIONS = [
    1 => 'Low concern',
    2 => 'Moderate concern',
    3 => 'Extreme concern',
    4 => 'Extinct',
  ];

 
  public function __construct($args=[]) {
    $this->commonName = $args['commonName'] ?? '';
    $this->habitat = $args['habitat'] ?? '';
    $this->food = $args['food'] ?? '';
    $this->conservationId = $args['conservationId'] ?? '';
    $this->backyardTips = $args['backyardTips'] ?? '';
  }

  public function name() {
    return "{$this->commonName} {$this->habitat} {$this->food}";
  }
  
  public function conservation() {
    if($this->conservationId > 0) {
      return self::CONSERVATION_OPTIONS[$this->conservationId];
    } else {
      return "Unknown";
    }
  }

}

?>
