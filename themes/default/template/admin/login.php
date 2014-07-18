<h1>Админка</h1>
<div class="errors"><?php echo validation_errors(); ?></div>
<div class="form">
   <?php echo form_open_multipart("/admin/login"); ?>

   <p>
      <?php echo form_label("Логин:", "login"); ?>
      <?php
         $class = 'id="login" class="small"';
         echo form_input("login", "", $class); 
      ?>
   </p>

   <p>
      <?php echo form_label("Пароль:", "password"); ?>
      <?php
         $class = 'class="small"';
         echo form_password("password", "", $class); 
      ?>
   </p>

   <p><?php echo form_submit('submit', 'Войти'); ?></p>
   <?php echo form_close(); ?>
</div>