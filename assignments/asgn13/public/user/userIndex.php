<?php require_once('../../private/initialize.php');
 requireLogin();
 requireLevel(1); 
?>

<?php
$users = User::findAll();

?>
<?php $pageTitle = 'Users Menu'; ?>
<?php include(SHARED_PATH . '/publicHeader.php'); ?>

<div id="content">
  <div id="main-menu">
    <h2>Main Menu</h2>
    <ul>
      <li><a href="<?php echo urlFor('/user/birds/birds.php'); ?>">birds</a></li>
      <?php 
      global $session;
        if($session->userLevel() == 2) { ?>
          <li><a href="<?php echo urlFor('/user/users.php'); ?>">users</a></li>
       <?php }?>
      <li><a href="<?php echo urlFor('/user/logout.php'); ?>">logout</a></li>
    </ul>
  </div>

</div>

<?php include(SHARED_PATH . '/publicFooter.php'); ?>