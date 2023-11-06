<?php

class Bird  extends DatabaseObject{

  static protected $tableName = 'birds';
  static protected $dbColumns = ['id', 'commonName', 'habitat', 'food', 'conservationId', 'backyardTips'];

  public $id;
  public $commonName;
  public $habitat;
  public $food;
  public $conservationId;
  public $backyardTips;
 
  public const CONSERVATION_OPTIONS = [
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

  protected function validate() {
    $this->errors = [];

    if(isBlank($this->commonName)) {
      $this->errors[] = "Name cannot be blank.";
    }
    if(isBlank($this->habitat)) {
      $this->errors[] = "The habitat cannot be blank.";
    }
    return $this->errors;
  }
}

?>
