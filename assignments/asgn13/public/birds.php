<?php 
  require_once('../private/initialize.php');
  $page_title = 'Bird List';
  include(SHARED_PATH . '/publicHeader.php');
?>

<h2>Bird inventory</h2>
<p>This is a short list -- start your birding!</p>

    <table border="1">
      <tr>
        <th>Name</th>
        <th>Habitat</th>
        <th>Food</th>
        <th>Conservation</th>
        <th>Backyard Tips</th>
      </tr>

<?php

// Create a new bird object that uses the find_all() method
$birds = Bird::findAll();



  foreach($birds as $bird) { 

  ?>
      <tr>
        <td><?php echo h($bird->commonName); ?></td>
        <td><?php echo h($bird->habitat); ?></td>
        <td><?php echo h($bird->food); ?></td>
        <td><?php echo h($bird->conservation()); ?></td>
        <td><?php echo h($bird->backyardTips); ?></td>

      </tr>
      <?php } ?>

    </table>


<?php include(SHARED_PATH . '/publicFooter.php'); ?>
