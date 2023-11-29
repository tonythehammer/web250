<?php 
  require_once('../private/initialize.php'); 
  include(SHARED_PATH . '/publicHeader.php'); 
?>

  <ul>
    <li><a href="<?php echo urlFor('/birds.php'); ?>">View Our List of WNC Birds</a></li>
    <li><a href="<?php echo urlFor('/about.php'); ?>">About Us</a></li>
    <li><a href="<?php echo urlFor('/user/index.php'); ?>">User login</a></li>
    <li><a class="action" href="<?php echo urlFor('/new.php'); ?>">Add A New Bird</a></li>
  </ul>
  <div class="actions">
      <a class="action" href="<?php echo urlFor('/user/new.php'); ?>">Add user</a>
    </div>

<?php include(SHARED_PATH . '/publicFooter.php'); ?>
