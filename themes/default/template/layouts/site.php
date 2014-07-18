<!DOCTYPE html>
<html>
<head>
  <title><?php if (isset($page_title)) { echo $page_title ." / purpleitch.ru — сайт для вдохновения"; } else { echo "purpleitch.ru — сайт для вдохновения"; } ?></title>
  <meta http-equiv="content-type" content="text/html;charset=utf-8" />
  <meta name="description" content="Сайт для вдохновения. Здесь вы найдёте красивые и вдохновляющие работы из области - архитектуры, фотографии, арта, музыки и видео." />
  <meta name="keywords" content="art, inspire, photography, architecture, interior, music, video, арт, архитектура, интерьер, сайт для вдохновения">

  <link rel="icon" href="http://29.media.tumblr.com/avatar_603feccf3550_16.png" />
  <link rel="stylesheet" href="<?php echo get_theme_url();?>/css/site.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo get_theme_url();?>/css/player.css" type="text/css" />

  <script type="text/javascript">
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-29409604-3']);
    _gaq.push(['_trackPageview']);

    (function() {
      var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
      ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
      var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();
   </script>

  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script> 
  <script type="text/javascript" src="<?php echo get_theme_url();?>/js/jquery.masonry.min.js"></script>


</head>


<body>
<div class="container">
  <div class="head">
    <div class="logo"><a href="/"><img src="<?php echo get_theme_url();?>/images/logo.png" /></a></div>
  </div>

  <div class="content">
  <?php echo $content; ?>
  </div>

  <?php if (isset($pagination)) { ?>
  <div class="pagination"><?php echo $pagination; ?></div>
  <?php } ?>

  <div class="footer">
    © purple itch, 2012
    <a href="http://coderszone.info/" class="candy_logo" target="_blank"><img src="<?php echo get_theme_url();?>/images/candy_logo.png" /></a>
  </div>
</div>

</body>
</html>