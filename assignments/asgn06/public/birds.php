<?php 
  require_once('../private/initialize.php');
  $page_title = 'Sightings';
  include(SHARED_PATH . '/public_header.php');
?>

<h2>Bird inventory</h2>
<p>This is a short list -- start your birding!</p>

<table border="1">
  <tr>
    <th>Common Name</th>
    <th>Habitat</th>
    <th>Food</th>
    <th>Nest placement</th>
    <th>Behavior</th>
    <th>Conservation</th>
    <th>Backyard Tips</th>
  </tr>
   
  <?php
  $parser = new ParseCSV(PRIVATE_PATH . '/wncBirds.csv');
  $birdArray = $parser->parse();
  ?>
      
  <?php foreach($birdArray as $args){?>
  <?php $bird = new Bird($args)?>  
  <tr>
    <td><?php echo h($bird->commonName)?></td>
    <td><?php echo h($bird->habitat)?></td>
    <td><?php echo h($bird->food)?></td>
    <td><?php echo h($bird->nestPlacement)?></td>
    <td><?php echo h($bird->behavior)?></td>
    <td><?php echo h($bird->conservation())?></td>
    <td><?php echo h($bird->backyardTips)?></td>
  </tr>
  <?php }?>
</table>


<?php include(SHARED_PATH . '/public_footer.php'); ?>
