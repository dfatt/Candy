<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru">
<head>
   <title><?php if (isset($page_title)) { echo $page_title ." / Candy"; } else { echo "Candy"; } ?></title>
   <meta http-equiv="content-type" content="text/html;charset=utf-8" />
   
   <link rel="stylesheet" href="<?php echo get_theme_url();?>/css/login.css" type="text/css" />
   <link rel="stylesheet" href="<?php echo get_theme_url();?>/css/common.css" type="text/css" />
   <link rel="shortcut icon" href="<?php echo get_theme_url();?>/images/favicon.ico"/>
   <link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700,400italic,700italic&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
  
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
  <script>
    $(document).ready(function(){
      $("#login").focus(); 
    });
  </script>

</head>
<body>
  <div class="content">
    <?php echo $content; ?>
  </div>

   <div class="footer"></div>
</body>
</html>