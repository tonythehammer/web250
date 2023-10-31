<?php if(isset($superHeroImage)) { ?>
  <div class="expanding-wrapper">
    <?php $imageUrl = urlFor('/images/' . $superHeroImage); ?>
    <img id="super-hero-image" src="<?php echo $imageUrl;?>">
    <footer>
      <?php include(SHARED_PATH . '/publicCopyrightDisclaimer.php'); ?>
    </footer>
  </div>
  <?php } else { ?>
    <footer>
      <?php include(SHARED_PATH . '/publicCopyrightDisclaimer.php');?>
    </footer>
  <?php } ?>

  </body>
</html>

<?php
dbDisconnect($database);
?>
