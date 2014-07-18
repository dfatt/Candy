<div class="full_post">

<?php if($post->type === "photo") {?>
  
  <div class="row">
  
  <?php
    $photos = get_photos($post->directory);

    foreach($photos as $photo)
    {
      if (!is_array($photo))
      {
        if (strlen($post->source) > 0) 
        {
          echo anchor($post->source, img(array('src'=>"photo/load/935/".$post->directory."/".$photo)), array('target' => '_blank', 'rel' => 'nofollow'));
        } 
        else 
        {
          echo anchor("photo/load/full/".$post->directory."/".$photo, img(array('src'=>"photo/load/935/".$post->directory."/".$photo)));
        }
      }
    }
  ?>
  
  </div>
  
  <script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
  <script type="text/javascript">stLight.options({publisher: "55e65374-9fcb-42d3-a858-1e4dea9b4339"}); </script>
  <span class='st_facebook_hcount' displayText='Facebook'></span>
  <span class='st_twitter_hcount' displayText='Tweet'></span>
  <span class='st_pinterest_hcount' displayText='Pinterest'></span>

<?php } ?>

</div>