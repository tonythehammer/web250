<?php

require_once('../../../private/initialize.php');

requireLogin();

if(is_post_request()) {

  // Create record using post parameters
  $args = $_POST['admin'];
  $admin = new Admin($args);
  $result = $admin->save();

  if($result === true) {
    $newId = $admin->id;
    $session->message('The admin was created successfully.');
    redirectTo(urlFor('/staff/admins/show.php?id=' . $newId));
  } else {
    // show errors
  }

} else {
  // display the form
  $admin = new Admin;
}

?>

<?php $page_title = 'Create Admin'; ?>
<?php include(SHARED_PATH . '/staffHeader.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo urlFor('/staff/admins/index.php'); ?>">&laquo; Back to List</a>

  <div class="admin new">
    <h1>Create Admin</h1>

    <?php echo displayErrors($admin->errors); ?>

    <form action="<?php echo urlFor('/staff/admins/new.php'); ?>" method="post">

      <?php include('form_fields.php'); ?>

      <div id="operations">
        <input type="submit" value="Create Admin" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
