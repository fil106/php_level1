﻿<?php
echo "<h1>Ошибка доступа к БД!!!</h1>";
?>
<p>У вас отсутствует доступ к БД. </p>
<p>Вероятные причины отсутствия доступа:</p>
<ol>
  <li>Не создана БД</li>
  <li>Неправильно указаны параметры доступа к БД. Проверьте файл конфигурации config/config.php</li>
</ol>
<p>При отсутствии БД вам необходимо восстановить ее из дампа БД. Для этого необходимо выполнить следующие действия.</p>

<h1>Восстановление  из резервной копии</h1>
<p>Восстановить  базу данных из файла, созданного с помощью утилиты mysqldump, достаточно  просто. Файл резервной копии – это просто набор инструкций SQL, которые могут  исполняться клиентом командной строки mysql и тем самым восстанавливать данные  из резервной копии.<br>
  Если  резервная копия базы данных в файле my_backup.sql создавалась с ключом  --all-databases, то восстановить базу данных можно так:</p>
<p>mysql  -u root -p &lt; dump_php1.sql</p>
<p>где:</p>
<ul>
  <li>mysql - утилита для восстановления резервной копии БД. По умолчанию, если вы используете openserver находится по пути OpenServer\modules\database\MySQL-5.5-x64\bin. В данном случае MySQL-5.5-x64 может меняться, в зависимости от MySQL установленного у вас</li>
  <li>dump_php1.sql - Дамп БД для текущего примера.</li>
</ul>
<p>Если у вас не получается восстановить БД из дампа БД, возможно у вас в ОС не прописаны пути к файлам. Можете поместить два этих файла в один каталог чтоб они друг друга видели или прописать абсолютные пути к файлам в команде mysql</p>
<p>&nbsp;</p>