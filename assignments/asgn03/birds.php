<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>asgn02 Inheritance</title>
</head>
<body>
<h1>Inheritance Examples</h1>

<?php 
    include 'Bird.php';
    
    $bird = new Bird;
    echo '<p>The generic song of any bird is "' . $bird->song . '".</p>';

    $fly_catcher = new YellowBelliedFlyCatcher;
    echo '<p>The song of the ' . $fly_catcher->name . ' on breeding grounds is "' . $fly_catcher->song . '".</p>';

    $kiwi = new Kiwi;
    $kiwi::$flying = "no";
    echo "<p>The " . $fly_catcher->name . " " . $fly_catcher->canFly() . ".</p>";
    echo "<p>The " . $kiwi->name . " " . $kiwi->canFly() . ".</p>";    

    echo "<p> The bird count is: " . Bird::$instanceCount. "</p>"; 
    echo "<p> The Yellow bellied fly catcher count is: " . YellowBelliedFlyCatcher::$instanceCount. "</p>"; 
    echo "<p> The kiwi count is: " . Kiwi::$instanceCount. "</p>"; 

    $bird2 = Bird::create();
    $kiwi2 = Kiwi::create();
    $yellowBelliedFlyCatcher2 = YellowBelliedFlyCatcher::create();

    echo "<p> The bird count is: " . Bird::$instanceCount. "</p>"; 
    echo "<p> The Yellow bellied fly catcher count is: " . YellowBelliedFlyCatcher::$instanceCount. "</p>"; 
    echo "<p> The kiwi count is: " . Kiwi::$instanceCount. "</p>"; 

?>
    </body>
</html>

