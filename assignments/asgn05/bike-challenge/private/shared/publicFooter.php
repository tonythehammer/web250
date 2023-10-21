<?php if(isset($super_hero_image)) { ?>

  <div class = "expanding-wrapper">
    <?php $image_url = urlFor('/images/' .$super_hero_image); ?>
    <img id="super-hero-image" src ='<?php echo $image_url;?> "/>
    <footer>
      <?php include(SHARED_PATH . '/publicCopyrightDisclaimer.php');?>
    </footer>  
  </div>
<?php } else { ?>

  <footer>
    <?php include(SHARED_PATH . '/publicCopyrightDisclaimer.php'); ?>
  </footer>
  <?php } ?>

  </body>
</html>
