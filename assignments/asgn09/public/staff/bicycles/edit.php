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

  // Save record using post parameters
  $args = $_POST['bicycle'];
  $bicycle->mergeAttributes($args);
  $result = $bicycle->save();

  if($result === true) {
    $_SESSION['message'] = 'The bicycle was updated successfully.';
    redirectTo(urlFor('/staff/bicycles/show.php?id=' . $id));
  } else {
    // show errors
  }

} else {

  // display the form

}

?>

<?php $page_title = 'Edit Bicycle'; ?>
<?php include(SHARED_PATH . '/staffHeader.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo urlFor('/staff/bicycles/index.php'); ?>">&laquo; Back to List</a>

  <div class="bicycle edit">
    <h1>Edit Bicycle</h1>

    <?php echo displayErrors($bicycle->errors); ?>

    <form action="<?php echo urlFor('/staff/bicycles/edit.php?id=' . h(u($id))); ?>" method="post">

      <?php include('formFields.php'); ?>

      <div id="operations">
        <input type="submit" value="Edit Bicycle" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/staffFooter.php'); ?>
