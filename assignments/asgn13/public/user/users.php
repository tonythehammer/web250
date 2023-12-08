<?php require_once('../../private/initialize.php');
 requireLogin();
 requireLevel(2); 
?>

<?php
$users = User::findAll();

?>
<?php $pageTitle = 'users'; ?>
<?php include(SHARED_PATH . '/publicHeader.php'); ?>

<div id="content">
  <div class="users listing">
    <h1>Users</h1>

    <table class="list">
      <tr>
        <th>ID</th>
        <th>First name</th>
        <th>Last name</th>
        <th>Email</th>
        <th>Username</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
      </tr>

      <div class="actions">
        <a class="action" href="<?php echo urlFor('/user/new.php'); ?>">Add user</a>
      </div>
      <?php foreach ($users as $user) { ?>
        <tr>
          <td><?php echo h($user->id); ?></td>
          <td><?php echo h($user->firstName); ?></td>
          <td><?php echo h($user->lastName); ?></td>
          <td><?php echo h($user->email); ?></td>
          <td><?php echo h($user->username); ?></td>
          <td><a class="action" href="<?php echo urlFor('/user/showUser.php?id=' . h(u($user->id))); ?>">View</a></td>
          <td><a class="action" href="<?php echo urlFor('/user/editUser.php?id=' . h(u($user->id))); ?>">Edit</a></td>
          <td><a class="action" href="<?php echo urlFor('/user/deleteUser.php?id=' . h(u($user->id))); ?>">Delete</a></td>
        </tr>
      <?php } ?>
    </table>

  </div>

</div>

<?php include(SHARED_PATH . '/publicFooter.php'); ?>