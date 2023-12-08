<?php require_once('../../private/initialize.php');

requireLogin();
requireLevel(2);

$id = $_GET['id'] ?? '1'; // PHP > 7.0

$user = User::findById($id);

?>

<?php $page_title = 'Show user: ' . h($user->fullName()); ?>
<?php include(SHARED_PATH . '/publicHeader.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo urlFor('/user/user.php'); ?>">&laquo; Back to List</a>

  <div class="user show">

    <h1>user: <?php echo h($user->fullName()); ?></h1>

    <div class="attributes">
      <dl>
        <dt>First name</dt>
        <dd><?php echo h($user->firstName); ?></dd>
      </dl>
      <dl>
        <dt>Last name</dt>
        <dd><?php echo h($user->lastName); ?></dd>
      </dl>
      <dl>
        <dt>Email</dt>
        <dd><?php echo h($user->email); ?></dd>
      </dl>
      <dl>
        <dt>Username</dt>
        <dd><?php echo h($user->username); ?></dd>
      </dl>
      <dl>
        <dt>user Level</dt>
        <dd><?php echo h($user->userLevel); ?></dd>
      </dl>
    </div>

  </div>

</div>
