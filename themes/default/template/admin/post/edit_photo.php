<h1>Загрузить фото</h1>


<div class="error"><?php echo validation_errors(); ?></div>
<?php echo form_open_multipart(); ?>

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
    echo form_input("caption", $post->caption, $class); 
  ?>
</p>


<p>
  <?php echo form_label("Описание:", "description"); ?>
  <?php
    $class = 'id="description" class="big"';
    echo form_textarea("description", $post->description, $class); 
  ?>
</p>


<p>
  <?php echo form_label("Источник:", "source"); ?>
  <?php
    $class = 'class="big"';
    echo form_input("source", $post->source, $class); 
  ?>
</p>


<p>
  <?php echo form_label("Теги:", ""); ?>
  <input type="hidden" id="tags_input" name="tags_input" value="<?php echo $post->tags ?>" />
  <ul id="tags"></ul>
</p>


<p><?php echo form_submit('submit', 'Опубликовать'); ?><a href="/admin" class="cancel">отмена</a></p>
<?php echo form_close(); ?>