<?php

$host           = 'sql_server.g';   // Имя хоста (hostname: sql_server.g из docker-compose.yaml)
$port           = '1521';           // Порт по умолчанию для Oracle
$service_name   = 'FREEPDB1';       // Имя сервиса (например, ORCLPDB1)
$username       = 'MISHA';          // Имя пользователя
$password       = 'MISHA';          // Пароль

// Формат строки подключения без SID
$conn = oci_connect($username, $password, "$host:$port/$service_name");

if (!$conn) {
    $e = oci_error();
    echo "Ошибка подключения: " . $e['message'];
} else {
    echo "Подключение успешно!";
    // Здесь вы можете выполнять запросы к базе данных
}

?>
