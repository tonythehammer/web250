<?php
class RoundCookie
{
  var $weight;
  var $color;
  var $icing;

  function decorate()
  {
    return "drizzle" . $this->icing;
  }
  function consume()
  {
  }
}

$cookie1 = new RoundCookie;
$cookie1->weight = "2 oz.";
$cookie1->color = "black";
$cookie1->icing = "Butter cream";
$cookie1->decorate();

echo " My first cookie weights " . $cookie1->weight . " it is " . $cookie1->color . "
and it is covered with " . $cookie1->icing;

echo " I will" . $cookie1->decorate();

$cookie2 = new RoundCookie;
$cookie2->weight = "200 oz.";
$cookie2->color = "black and red";
$cookie2->icing = "Butter cream";

echo " My first cookie weights " . $cookie2->weight . " it is " . $cookie2->color . "
and it is covered with " . $cookie2->icing;
