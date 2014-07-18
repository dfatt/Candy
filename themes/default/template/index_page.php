<?php foreach ($posts as $post): ?>

<div class="post">

<?php // Если это фото-пост ?>
<?php if($post->type === "photo") {?>
  <?php
    // Фотографии к посту
    $photos = get_photos($post->directory);

    foreach($photos as $photo):
      // Загрузка миниатюр
      // Выбираем только изображения, все левые папки поста отсекаем
      if (!is_array($photo)) 
      {
        echo anchor("/post/".$post->id, img(array('src'=>"photo/load/280/".$post->directory."/".$photo)));
      }
    endforeach;

    // *Для сжатия урл передаётся в контроллер – /app/controllers/photo, в нём вы можете указать нужные вариант масштабирования
  ?>

<?php } else {?>

<?php // Если это аудио-пост ?>
<?php if($post->type === "audio") { ?>

<script type="text/javascript">
  $(document).ready(function(){
    var player = new CirclePlayer("#player_<?php echo $post->directory; ?>",
    {
      mp3:"/uploads/<?php echo $post->directory; ?>/audio_file.mp3"
    }, 
    {
      supplied: "mp3",
      cssSelectorAncestor: "#player_container_<?php echo $post->directory; ?>"
    });
  });
</script>

<div id="player_<?php echo $post->directory; ?>" class="cp-jplayer"></div>
<div id="player_container_<?php echo $post->directory; ?>" class="cp-container">
  <ul class="cp-controls">
    <li><a href="#" class="cp-play">play</a></li>
    <li><a href="#" class="cp-pause" style="display:none;">pause</a></li> 
  </ul>
</div>

<img src="/uploads/<?php echo $post->directory; ?>/cover.jpg" width="280" height="280" />

<script type="text/javascript" src="<?php echo get_theme_url();?>/js/jplayer/jquery.transform.js"></script>
<script type="text/javascript" src="<?php echo get_theme_url();?>/js/jplayer/jquery.grab.js"></script>
<script type="text/javascript" src="<?php echo get_theme_url();?>/js/jplayer/jquery.jplayer.js"></script>
<script type="text/javascript" src="<?php echo get_theme_url();?>/js/jplayer/mod.csstransforms.min.js"></script>
<script type="text/javascript" src="<?php echo get_theme_url();?>/js/jplayer/circle.player.js"></script>

<?php } ?>

<?php }?>

<?php //Обработка тегов к посту. Все теги в версии 4000, хранятся в виде простого поля. ?>
<?php if ($post->tags != null) { ?>
<ul class="tags">

  <?php
    $tags = explode( ", ", $post->tags);
    foreach ($tags as $key => $value) {
  ?>

  <li><a href="/tag/<?php echo $value; ?>"><?php echo $value; ?></a></li>
  
  <?php } ?>

<?php } ?>

</ul>
</div>

<?php endforeach ?>

<!-- Для вывода постов в виде газетной ленты -->
<script>
  $(function(){

  var $container = $('.content');

  $container.imagesLoaded( function(){
    $container.masonry({
      itemSelector : '.post'
    });
  });

});
</script>