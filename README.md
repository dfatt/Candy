Candy
=====

Candy — это бесплатный движок с открытым кодом, который позволяет делиться с другими вашим творчеством. Простой движок для ведения Tumblr-like блогов, только на своём хостинге.

## Установка
  1. Загрузите файлы на свой хостинг через ФТП или панель хостинга.
  2. Установите права папке "uploads" – 777 (чтение и запись).
  3. Установите права файлу "/app/config/candy.php" – 777 (чтение и запись), и укажите в этом файле ваше имя и пароль (для входа в админку):
   
    ```php
    $config['login'] = 'your_user_name';
    $config['password'] = '4534strongpa55wordz';
    ```
  4. Заполните основные данные для подключения к БД, в файле "/app/config/database.php":
  
    ```php
    // Адрес базы данных
    $db['default']['hostname'] = '127.0.0.1';
    
    // Имя пользователя
    $db['default']['username'] = 'root';
    
    // Пароль
    $db['default']['password'] = '';
    
    // Имя базы данных
    $db['default']['database'] = 'candy_db';
    $db['default']['dbdriver'] = 'mysql';
    ```
  5. Затем выполните скрипт (обычно это можно сделать через [phpMyAdmin](http://damir.in/projects/candy/images/create_table.png)):
   
    ```sql
    CREATE TABLE `posts` (
      `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
      `caption` text,
      `description` text,
      `directory` varchar(11) DEFAULT NULL,
      `source` text,
      `type` varchar(10) DEFAULT NULL,
      `tags` text,
      `date_create` datetime DEFAULT NULL,
      PRIMARY KEY (`id`)
    ) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
    ```

Зайдите по этому адресу, для начала работы с вашим сайтом:
http://ваш_сайт.com/admin

## Контакты
Если у вас возникнут вопросы по установке, вы нашли ошибки в движке или вы видите как что-то можно улучшить – напишите мне на damir.fattahov@gmail.com, я обязательно вам отвечу.
