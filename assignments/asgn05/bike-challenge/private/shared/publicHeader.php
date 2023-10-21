<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <title>Bike Challenge <?php if(isset($pageTitle)){ echo '- ' . h ($pageTitle);}?> </title>
    <link rel = "stylesheet" media = "all"
    href="<?php echo urlFor('/stylesheets/public.css');?>">
  </head>

  <body>

    <header>
      <h1>
        <a href="<?php echo urlFor('/index.php'); ?>">
        <img class = "bike-icon" src="<?php echo urlFor('/images/USDOT_bicycle_symbol.svg');?>" alt="Bicycle shop's logo"><br>
        Chain Gang
        </a>
      </h1>
    </header>


