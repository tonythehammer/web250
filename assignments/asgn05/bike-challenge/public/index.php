<?php require_once('../private/initialize.php');

include(SHARED_PATH . '/publicHeader.php');?>

<div id="main">
  <ul id="menu">
    <li><a href="<?php echo urlFor('/bicycles.php'); ?>">View Our Inventory</a></li>
    <li><a href="<?php echo urlFor('/about.php')?>">About Us</a></li>
  </ul>
</div>

<?php $super_hero_image = 'AdobeStock_18040381_xlarge.jpeg';
include(SHARED_PATH . '/publicFooter.php');
?>