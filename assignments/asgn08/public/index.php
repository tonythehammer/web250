<?php 
  require_once('../private/initialize.php'); 
  include(SHARED_PATH . '/publicHeader.php'); 
?>

  <ul>
    <li><a href="<?php echo urlFor('/birds.php'); ?>">View Our List of WNC Birds</a></li>
    <li><a href="<?php echo urlFor('/about.php'); ?>">About Us</a></li>
  </ul>

<?php include(SHARED_PATH . '/publicFooter.php'); ?>
