<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru">
<head>
   <title><?php if (isset($page_title)) { echo $page_title ." / Candy"; } else { echo "Candy"; } ?></title>
   <meta http-equiv="content-type" content="text/html;charset=utf-8" />

   <link rel="stylesheet" href="<?php echo get_theme_url();?>/css/common.css" type="text/css" />
   <link rel="stylesheet" href="<?php echo get_theme_url();?>/css/candy.css" type="text/css" />
   <link rel="stylesheet" href="<?php echo get_theme_url();?>/css/jquery.tagit.css" type="text/css" />
   <link rel="stylesheet" href="<?php echo get_theme_url();?>/js/redactor/css/redactor.css" />
   <link rel="shortcut icon" href="<?php echo get_theme_url();?>/images/favicon.ico"/>
   
   <link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700,400italic,700italic&subset=latin,cyrillic' rel='stylesheet' type='text/css'> 

   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.12/jquery-ui.min.js"></script>
   <script src="<?php echo get_theme_url();?>/js/jquery.client.js"></script>
   <script src="<?php echo get_theme_url();?>/js/redactor/redactor.js"></script>
   <script src="<?php echo get_theme_url();?>/js/jquery.tag-it.js" type="text/javascript" charset="utf-8"></script>
   <script>
       $(function(){
          $('#tags').tagit({
              allowSpaces: true,
              singleFieldDelimiter: ', ', 
              singleField: true,
              singleFieldNode: $('#tags_input')
          });

          $('textarea[name="description"]').redactor({ autoresize: true, lang: 'ru' });
       });
   </script>
</head>
<body> 
   <div class="sidebar">
   	<ul>
   	   <li><a href="/admin/text"><img src="<?php echo get_theme_url();?>/images/icons/text.png" /><br />заметка</a></li>
   	   <li><a href="/admin/photo"><img src="<?php echo get_theme_url();?>/images/icons/photo.png" /><br />фото</a></li>
   	   <li><a href="/admin/audio"><img src="<?php echo get_theme_url();?>/images/icons/audio.png" /><br />аудио</a></li>
       <li class="space"></li>
       <li><a href="/admin/prefs"><img src="<?php echo get_theme_url();?>/images/icons/settings.png" /><br />настройки</a></li>
       <li class="space"></li>
       <li><a href="/admin/logout"><img src="<?php echo get_theme_url();?>/images/icons/logout.png" /><br />выход</a></li>
   	</ul>
   </div>
   
   <div class="content">
   	<?php echo $content; ?>
   </div>

   <div class="footer"></div>
</body>
</html>