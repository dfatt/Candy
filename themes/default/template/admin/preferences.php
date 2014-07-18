<h1>Настройки</h1>

<div class="errors"><?php echo validation_errors(); ?></div>
<?php echo form_open(); ?>


<p>
  <?php echo form_label("Имя вашего проекта:", "name_project"); ?>
  <?php
    $class = 'class="big"';
    echo form_input("name_project", $prefs["name_project"], $class); 
  ?>
</p>


<p>
  <?php echo form_label("Описание вашего проекта:", "description_project"); ?>
  <?php
    $class = 'class="big"';
    echo form_input("description_project", $prefs["description_project"], $class); 
  ?>
</p>


<p>
  <?php echo form_label("Дизайн:", "design"); ?>
  <?php $options = array(
            'default'  => 'default',
            'photograph'    => 'photograph',
            'musican'   => 'musican',
  );

  echo form_dropdown('design', $options, $prefs["design"]); ?>
</p>


<p>
  <?php echo form_label("Ключевые слова:", "keywords"); ?>
  <?php
    $class = 'class="big"';
    echo form_input("keywords", $prefs["keywords"], $class); 
  ?>
</p>


<p><?php echo form_submit('submit', 'Сохранить'); ?></p>
<?php echo form_close(); ?>