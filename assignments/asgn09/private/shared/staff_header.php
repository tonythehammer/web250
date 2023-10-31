<?php
  if(!isset($pageTitle)) { $pageTitle = 'Staff Area'; }
?>

<!doctype html>

<html lang="en">
  <head>
    <title>Chain Gang - <?php echo h($page_title); ?></title>
    <meta charset="utf-8">
    <link rel="stylesheet" media="all" href="<?php echo urlFor('/stylesheets/staff.css'); ?>" />
  </head>

  <body>
    <header>
      <h1>Chain Gang Staff Area</h1>
    </header>

    <navigation>
      <ul>
        <li><a href="<?php echo urlFor('/staff/index.php'); ?>">Menu</a></li>
      </ul>
    </navigation>

    <?php echo displaySessionMessage(); ?>
