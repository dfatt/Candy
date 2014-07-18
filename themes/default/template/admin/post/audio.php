<h1>Загрузить аудио</h1>


<div class="error"><?php echo validation_errors(); ?></div>
<?php echo form_open_multipart("/admin/audio/add"); ?>

<div class="files">
  <?php echo form_label("Обложка:", "userfile_1"); ?>
  <?php echo form_upload("userfile_1"); ?>
  <br /><br />
  <?php echo form_label("Трек:", "userfile_2"); ?>
  <?php echo form_upload("userfile_2"); ?>
</div>


<p>
  <?php echo form_label("Заголовок:", "caption"); ?>
  <?php
    $class = 'class="big"';
    echo form_input("caption", set_value('caption'), $class); 
  ?>
</p>


<p>
  <?php echo form_label("Описание:", "description"); ?>
  <?php
    $class = 'id="description" class="big"';
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
  <?php echo form_label("Теги:", ""); ?>
  <input type="hidden" id="tags_input" name="tags_input" />
  <ul id="tags"></ul>
</p>


<p><?php echo form_submit('submit', 'Опубликовать'); ?><a href="/admin" class="cancel">отмена</a></p>
<?php echo form_close(); ?>