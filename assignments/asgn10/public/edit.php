<?php

require_once('../private/initialize.php');

if (!isset($_GET['id'])) {
  redirectTo(urlFor('/index.php'));
}
$id = $_GET['id'];
$bird = Bird::findById($id);
if ($bird == false) {
  redirectTo(urlFor('/index.php'));
}

if (isPostRequest()) {

  $args = $_POST['bird'];
  $bird->mergeAttributes($args);
  $result = $bird->save();

  if ($result === true) {
    $_SESSION['message'] = 'The bird was updated successfully.';
    redirectTo(urlFor('/detail.php?id=' . $id));
  } else {
  }
} else {
}

?>

<?php $page_title = 'Edit Bird'; ?>
<?php include(SHARED_PATH . '/publicHeader.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo urlFor('/birds.php'); ?>">&laquo; Back to List</a>

  <div class="bird edit">
    <h1>Edit Bird</h1>

    <?php echo displayErrors($bird->errors); ?>

    <form action="<?php echo urlFor('/edit.php?id=' . h(u($id))); ?>" method="post">

      <?php include('formFields.php'); ?>

      <div id="operations">
        <input type="submit" value="Edit Bird" />
      </div>
    </form>
  </div>
</div>

<?php include(SHARED_PATH . '/publicFooter.php'); ?>