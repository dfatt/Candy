<h1>Загрузить фото</h1>


<div class="error"><?php echo validation_errors(); ?></div>
<?php echo form_open_multipart("/admin/photo/add"); ?>

<a href="#" class="ajax_link" id="add">Добавить файл</a>
<br />
<br />
<div class="files">
  <?php echo form_upload("userfile_1"); ?>
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