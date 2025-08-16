#### Проверить статус репликации (на слейве) (single source)

`SHOW SLAVE STATUS`

* Slave_IO_Running: Yes — слейв читает бинарный лог с мастера
* Slave_SQL_Running: Yes — слейв применяет изменения
* Seconds_Behind_Master: задержка в секундах
* Last_Error, Last_IO_Error, Last_SQL_Error: последние ошибки
* Master_Log_File, Read_Master_Log_Pos: позиция чтения
* Exec_Master_Log_Pos: позиция выполнения

#### Посмотреть все слейвы
`SHOW ALL SLAVES STATUS;`

#### Посмотреть конкретный слейв
`SHOW SLAVE 'master1' STATUS;
`SHOW SLAVE 'master2' STATUS;`

#### Пример настроек слейва (multi-source)
`-- Канал для master1
CHANGE MASTER TO
MASTER_HOST='xxx',
MASTER_USER='repl',
MASTER_PASSWORD='pass',
MASTER_LOG_FILE='mysql-bin.000001',
MASTER_LOG_POS=456
FOR CHANNEL 'master1';

-- Канал для master2
CHANGE MASTER TO
MASTER_HOST='xxx',
MASTER_USER='repl',
MASTER_PASSWORD='pass',
MASTER_LOG_FILE='mysql-bin.000002',
MASTER_LOG_POS=123
FOR CHANNEL 'master2';`

#### Запуск слейва
`START SLAVE FOR CHANNEL 'master1';` - multi-source
`START SLAVE` - single-source

#### Остановка слейва
`STOP SLAVE FOR CHANNEL 'master2';` - multi-source
`STOP SLAVE` - single-source
