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

  // Save record using post parameters
  $args = $_POST['admin'];
  $admin->mergeAttributes($args);
  $result = $admin->save();

  if($result === true) {
    $session->message('The admin was updated successfully.');
    redirectTo(urlFor('/staff/admins/show.php?id=' . $id));
  } else {
    // show errors
  }

} else {

  // display the form

}

?>

<?php $page_title = 'Edit Admin'; ?>
<?php include(SHARED_PATH . '/staffHeader.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo urlFor('/staff/admins/index.php'); ?>">&laquo; Back to List</a>

  <div class="admin edit">
    <h1>Edit Admin</h1>

    <?php echo displayErrors($admin->errors); ?>

    <form action="<?php echo urlFor('/staff/admins/edit.php?id=' . h(u($id))); ?>" method="post">

      <?php include('formFields.php'); ?>

      <div id="operations">
        <input type="submit" value="Edit Admin" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/staffFooter.php'); ?>
