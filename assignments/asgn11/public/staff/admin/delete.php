<?php

require_once('../../../private/initialize.php');

requireLogin();

if(!isset($_GET['id'])) {
  redirectTo(urlFor('/staff/admins/index.php'));
}
$id = $_GET['id'];
$admin = Admin::findById($id);
if($admin == false) {
  redirectTo(urlFor('/staff/admins/index.php'));
}

if(isPostRequest()) {

  // Delete admin
  $result = $admin->delete();
  $session->message('The admin was deleted successfully.');
  redirectTo(urlFor('/staff/admins/index.php'));

} else {
  // Display form
}

?>

<?php $pageTitle = 'Delete Admin'; ?>
<?php include(SHARED_PATH . '/staffHeader.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo urlFor('/staff/admins/index.php'); ?>">&laquo; Back to List</a>

  <div class="admin delete">
    <h1>Delete Admin</h1>
    <p>Are you sure you want to delete this admin?</p>
    <p class="item"><?php echo h($admin->fullName()); ?></p>

    <form action="<?php echo urlFor('/staff/admins/delete.php?id=' . h(u($id))); ?>" method="post">
      <div id="operations">
        <input type="submit" name="commit" value="Delete Admin" />
      </div>
    </form>
  </div>

</div>

<?php include(SHARED_PATH . '/staffFooter.php'); ?>
