<?php

class Bird {
  var $commonName;
  var $conservationLevel;
  var $food = 'bugs';
  var $nestPlaceMent = 'tree';
  var $song;
  var $canFly = 'This bird can fly';

  function properties() {
    return $this->commonName. "<br> " . $this->food. "<br> ". $this->nestPlaceMent. "<br> " . $this->conservationLevel. "<br>";
  }

  function methods(){
    return "Bird song is ". $this->song . " and " . $this->canFly. ".<br><br>";
  }
}

$bird1 = new Bird;
$bird1->commonName = 'Eastern Towhee';
$bird1->food = 'seeds, fruit, insects, spiders';
$bird1->nestPlaceMent = 'Ground';
$bird1->conservationLevel = 'Low';
$bird1->song = 'drink-your-tea !';
$bird1->canFly; 

$bird2 = new Bird;
$bird2->commonName = 'Indigo Bunting';
$bird2->food = 'small seeds, berries, buds, and insects';
$bird2->nestPlaceMent = 'roadsides, and railroad rights of wayfields and on the edges';
$bird2->conservationLevel = 'Low';
$bird2->song = 'what!';
$bird2->canFly;

echo $bird1->properties();
echo $bird1->methods();

echo $bird2->properties();
echo $bird2->methods();
?>