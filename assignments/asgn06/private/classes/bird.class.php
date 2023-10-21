<?php

class Bird {
  public $commonName;
  Public $habitat;
  Public $food;
  public $nestPlacement;
  public $behavior;
  public $conservationId;
  public $backyardTips;

  protected const CONDITION_OPTIONS = [
  1 => 'Low concern',
  2 => 'Moderate concern',
  3 => 'Extreme concern',
  4 => 'Extinct' 
  ];

  public function __construct($args=[])
  {
    $this->commonName = $args['commonName'] ?? '';
    $this->habitat = $args['habitat'] ?? '';
    $this->food = $args['food'] ?? '';
    $this->nestPlacement = $args['nestPlacement'] ?? '';
    $this->behavior = $args['behavior'] ?? '';
    $this->conservationId = $args['conservationId'] ?? 1;
    $this->backyardTips = $args['backyardTips'] ?? '';
  }
 
  public function conservation(){
    if($this->conservationId > 0){
      return self::CONDITION_OPTIONS[$this->conservationId];
    }
    else {
      return "Unknown";
    }
  }
}

?>
