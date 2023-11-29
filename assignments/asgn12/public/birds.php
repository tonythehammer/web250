<?php
require_once('../private/initialize.php');
$page_title = 'Sightings';
include(SHARED_PATH . '/publicHeader.php');
?>

<h2>Bird inventory</h2>
<p>This is a short list -- start your birding!</p>

<table border="1">
  <tr>
    <th>Common Name</th>
    <th>Habitat</th>
    <th>Food</th>
    <th>Conservation</th>
    <th>Backyard Tips</th>
    <th>&nbsp;</th>
    <th>&nbsp;</th>
    <th>&nbsp;</th>
  </tr>

  <?php
  $birds = Bird::findAll();
  ?>
  <?php foreach ($birds as $bird) { ?>
    <tr>
      <td><?php echo h($bird->commonName) ?></td>
      <td><?php echo h($bird->habitat) ?></td>
      <td><?php echo h($bird->food) ?></td>
      <td><?php echo h($bird->conservation()) ?></td>
      <td><?php echo h($bird->backyardTips) ?></td>
      <td><a class ="action" href="detail.php?id=<?php echo $bird->id; ?>">View</a></td>
      <td><a class="action" href="<?php echo urlFor('/edit.php?id=' . h(u($bird->id))); ?>">Edit</a></td>
          <td><a class="action" href="<?php echo urlFor('/delete.php?id=' . h(u($bird->id))); ?>">Delete</a></td>
    </tr>
  <?php } ?>
</table>


<?php include(SHARED_PATH . '/publicFooter.php'); ?>