<h1>Посты</h1>

<?php if ($this->session->flashdata('error') != "") { ?>
<div class="error"><?php echo $this->session->flashdata('error'); ?></div>
<?php } ?>

<?php if ($this->session->flashdata('success') != "") { ?>
<div class="success"><?php echo $this->session->flashdata('success'); ?></div>
<?php } ?>


<?php foreach ($posts as $post): ?>

<div class="post">


<?php // Если это заметка ?>
<?php if($post->type === "text") {?>
  

  <h2><?php echo anchor('/admin/text/delete/' . $post->id, 'x', 'class="delete"'); ?><?php echo anchor('/admin/text/edit/' . $post->id, $post->caption); ?></h2>
 
  <p>
    <?php echo $post->description; ?>
  </p>


<?php } else { ?>



<?php // Если это фото-пост ?>
<?php if($post->type === "photo") {?>
  

  <h2><?php echo anchor('/admin/photo/delete/' . $post->id, 'x', 'class="delete"'); ?><?php echo anchor('/admin/photo/edit/' . $post->id, $post->caption); ?></h2>
  
  <div class="row">
    <?php
      $photos = get_photos($post->directory);

      $photos_count = count($photos);

      foreach($photos as $photo):
      if (!is_array($photo)) 
      {
        echo anchor("/post/".$post->id, img(array('src'=>"photo/load/280/".$post->directory."/".$photo)));
      }
      endforeach;
     ?>
  </div>
  
  <p>
    <?php echo $post->description; ?>
  </p>


<?php } else { ?>

<?php // Если это аудио-пост ?>
  <?php if($post->type === "audio") { ?>


  <h2><?php echo anchor('/admin/audio/delete/' . $post->id, 'x', 'class="delete"'); ?><?php echo anchor('/admin/audio/edit/' . $post->id, $post->caption); ?></h2>
  
  <div class="row">
    <img src="/uploads/<?php echo $post->directory; ?>/cover.jpg" width="280" height="280" />
  </div>

  <p>
    <?php echo $post->description; ?>
  </p>


  <?php } ?>


<?php } ?>
<?php } ?>




</div>
<br />


<?php endforeach ?>






<div class="pagination"><?php echo $pagination; ?></div>
