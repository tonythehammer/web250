<?php

class Bird 
{
    public $habitat;
    public $food;
    public $nesting = "tree";
    public $conservation;
    public $song = "chirp";
    public static $flying = "yes";
    public static $instanceCount;
    public static $eggNum = 0;

    public function canFly() {
        $flyingString = static::$flying == "yes" ?  "can fly." : "is stuck on the ground.";
        return  'is a bird that ' . $flyingString ;
    }

    public static function create(){
      $className = get_called_class();
      $obj = new $className;
      self::$instanceCount++;
      return $obj;
    }
}

class YellowBelliedFlyCatcher extends Bird {
    public $name = "yellow-bellied flycatcher";
    public $diet = "mostly insects.";
    public $song = "flat chilk";
}

class Kiwi extends Bird {
    public $name = "kiwi";
    public $diet = "omnivorous";
    public static $flying = "no";
}

class FlyCatcher extends Bird {
  public static $eggNum = "3-4, sometimes 5.";
}
