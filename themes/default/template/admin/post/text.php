<h1>Добавить текст</h1>


<div class="error"><?php echo validation_errors(); ?></div>
<?php echo form_open_multipart("/admin/text/add"); ?>
<p>
   <?php echo form_label("Заголовок:", "caption"); ?>
   <?php
      $class = 'class="big"';
      echo form_input("caption", set_value('caption'), $class); 
   ?>
</p>


<p>
   <?php echo form_label("Текст:", "description"); ?>
   <?php
      $class = 'class="big"';
      echo form_textarea("description", set_value('description'), $class); 
   ?>
</p>


<p>
  <?php echo form_label("Источник:", "source"); ?>
  <?php
    $class = 'class="big"';
    echo form_input("source", set_value('source'), $class); 
  ?>
</p>


<p>
  <?php echo form_label("Теги:", "tags"); ?>
  <input type="hidden" id="tags_input" name="tags_input" value="<?php echo set_value('tags_input')?>" />
  <ul id="tags"></ul>
</p>


<p><?php echo form_submit('submit', 'Опубликовать'); ?><a href="/admin" class="cancel">отмена</a></p>
<?php echo form_close(); ?>