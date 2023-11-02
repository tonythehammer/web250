<?php

require_once('../../../private/initialize.php');

if(!isset($_GET['id'])) {
  redirectTo(urlFor('/staff/bicycles/index.php'));
}
$id = $_GET['id'];
$bicycle = Bicycle::findById($id);
if($bicycle == false) {
  redirectTo(urlFor('/staff/bicycles/index.php'));
}

if(isPostRequest()) {

  // Delete bicycle
  $result = $bicycle->delete();
  $_SESSION['message'] = 'The bicycle was deleted successfully.';
  redirectTo(urlFor('/staff/bicycles/index.php'));

} else {}

?>

<?php $pageTitle = 'Delete Bicycle'; ?>
<?php include(SHARED_PATH . '/staffHeader.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo urlFor('/staff/bicycles/index.php'); ?>">&laquo; Back to List</a>

  <div class="bicycle delete">
    <h1>Delete Bicycle</h1>
    <p>Are you sure you want to delete this bicycle?</p>
    <p class="item"><?php echo h($bicycle->name()); ?></p>

    <form action="<?php echo urlFor('/staff/bicycles/delete.php?id=' . h(u($id))); ?>" method="post">
      <div id="operations">
        <input type="submit" name="commit" value="Delete Bicycle" />
      </div>
    </form>
  </div>

</div>

<?php include(SHARED_PATH . '/staffFooter.php'); ?>
