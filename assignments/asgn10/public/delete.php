<?php

require_once('../private/initialize.php');

if(!isset($_GET['id'])) {
  redirectTo(urlFor('/index.php'));
}
$id = $_GET['id'];
$bird = Bird::findById($id);
if($bird == false) {
  redirectTo(urlFor('/index.php'));
}

if(isPostRequest()) {

  // Delete bicycle
  $result = $bird->delete();
  $_SESSION['message'] = 'The bird was deleted successfully.';
  redirectTo(urlFor('/birds.php'));

} else {}

?>

<?php $pageTitle = 'Delete Bird'; ?>
<?php include(SHARED_PATH . '/publicHeader.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo urlFor('/index.php'); ?>">&laquo; Back to List</a>

  <div class="bird delete">
    <h1>Delete Bird</h1>
    <p>Are you sure you want to delete this bird?</p>
    <p class="item"><?php echo h($bird->name()); ?></p>

    <form action="<?php echo urlFor('/delete.php?id=' . h(u($id))); ?>" method="post">
      <div id="operations">
        <input type="submit" name="commit" value="Delete Bird" />
      </div>
    </form>
  </div>

</div>

<?php include(SHARED_PATH . '/publicFooter.php'); ?>
